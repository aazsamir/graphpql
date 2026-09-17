<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Generator;

use Aazsamir\Graphpql\Client\GraphqlClient;
use Aazsamir\Graphpql\Client\QueryBuilder;
use Aazsamir\Graphpql\Client\Response;
use Aazsamir\Graphpql\Schema\Field;
use Aazsamir\Graphpql\Schema\Schema;
use Aazsamir\Graphpql\Schema\Type;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\Method;

class OperationGenerator
{
    use FromArraySerVar;
    use TypeSkip;

    public function __construct(
        private Schema $schema,
        private NameResolver $nameResolver,
        private FileAccess $fileAccess,
        private SelectionSetGenerator $selectionSetGenerator,
    ) {}

    public function generateOperation(
        Field $operation,
        Namespaced $namespace,
        string $outputDir,
        string $interface,
        string $namespaceSuffix,
    ): void {
        $name = $this->getOperationClassname($operation);
        $returnType = $this->schema->findType($operation->type->primary()->name);

        $class = $this->createOperationClass($operation, $namespace, $interface);
        $constructor = $this->addConstructor($class);

        $this->addOperationArgsToMethod($constructor, $operation, $namespace);
        $this->addGetVarsMethod($class, $operation, $namespace);
        $this->addSelectionMethods($class, $returnType, $namespace, $outputDir);
        $this->addGraphqlClient($class);
        $this->addDoMethod($class, $operation, $namespace);
        $this->addOperationDdMethod($class);

        $this->fileAccess->saveFile($name, $namespace->add($namespaceSuffix), $outputDir . '/' . $namespaceSuffix, $class);
    }

    public function generateApi(Namespaced $namespace, string $outputDir): void
    {
        $class = new ClassType('Api');

        $constructor = $this->addConstructor($class);

        $constructor
            ->addPromotedParameter('graphqlClient')
            ->setType(GraphqlClient::class);

        $data = [
            'Query' => $this->schema->queries,
            'Mutation' => $this->schema->mutations,
        ];

        foreach ($data as $operationType => $operations) {
            foreach ($operations as $operation) {
                $classname = $this->getOperationClassname($operation);
                $method = $class->addMethod($operation->name);
                $this->addOperationArgsToMethod($method, $operation, $namespace, false);
                $body = "\$operation = new {$namespace}\\{$operationType}\\{$classname}(\n";

                foreach ($this->collectFieldFields($operation, $namespace) as $arg) {
                    $body .= "    \${$arg['name']},\n";
                }

                $body .= ");\n\n";
                $body .= 'return $operation->withClient($this->graphqlClient);';
                $method->addBody($body);

                $operationTypeName = $namespace->add($operationType)->add($classname)->toString();

                $method->setReturnType($operationTypeName);

                if ($operation->isDeprecated) {
                    $method->addComment('@deprecated ' . $operation->deprecationReason);
                }
            }
        }

        $this->fileAccess->saveFile('Api', $namespace, $outputDir, $class);
    }

    private function addConstructor(ClassType $class): Method
    {
        return $class->addMethod('__construct')->setPublic();
    }

    private function createOperationClass(
        Field $operation,
        Namespaced $namespace,
        string $interface,
    ): ClassType {
        $name = $this->getOperationClassname($operation);

        $class = new ClassType($name);
        $class->addImplement($interface);
        $class->addConstant('NAME', $operation->name);

        // add getName
        $class->addMethod('getName')
            ->setStatic()
            ->setPublic()
            ->setReturnType('string')
            ->addBody('return self::NAME;');

        if ($operation->isDeprecated) {
            $class->addComment('@deprecated ' . $operation->deprecationReason);
        }

        return $class;
    }

    private function getOperationClassname(Field $operation): string
    {
        return ucfirst($operation->name);
    }

    private function addOperationArgsToMethod(Method $method, Field $operation, Namespaced $namespace, bool $promoted = true): void
    {
        foreach ($this->collectFieldFields($operation, $namespace) as $arg) {
            if ($promoted) {
                $param = $method->addPromotedParameter($arg['name']);
            } else {
                $param = $method->addParameter($arg['name']);
            }

            $param = $param
                ->setType($arg['type'])
                ->setNullable($arg['nullable']);

            if ($arg['nullable']) {
                $param->setDefaultValue(null);
            }

            if ($arg['docblock']) {
                $method->addComment('@param ' . $arg['docblock'] . ' $' . $arg['name']);
            }
        }
    }

    private function addGetVarsMethod(ClassType $class, Field $operation, Namespaced $namespace): void
    {
        $method = $class->addMethod('getVars')
            ->setPublic()
            ->setReturnType('array');

        $body = "return [\n";

        foreach ($this->collectFieldFields($operation, $namespace) as $arg) {
            $body .= "    '{$arg['name']}' => \$this->{$arg['name']},\n";
        }

        $body .= '];';
        $method->addBody($body);
    }

    private function addSelectionMethods(
        ClassType $class,
        Type $returnType,
        Namespaced $namespace,
        string $outputDir,
    ): void {
        $selectionType = $this->selectionSetGenerator->generateSelectionSet(
            $returnType,
            $namespace,
            $outputDir,
        );

        if ($selectionType === 'mixed') {
            throw new \Exception('Unreachable');
        }

        $class->addProperty('selection')->setType($selectionType)->setPrivate();

        // add selector()
        $method = $class->addMethod('selector');
        $method
            ->setPublic()
            ->setReturnType('self');

        $method->addParameter('selection')->setType('callable');
        $method->addComment("@param callable($selectionType): void \$selection");

        $body = <<<PHP
        if (!isset(\$this->child)) {
            \$this->selection = {$selectionType}::new();
        }

        \$selection(\$this->selection);

        return \$this;
        PHP;
        $method->addBody($body);

        // add setSelectionSet
        $method = $class->addMethod('setSelection')
            ->setPublic()
            ->setReturnType('self');

        $method
            ->addParameter('selection')
            ->setType($selectionType);

        $body = <<<'PHP'
        $this->selection = $selection;

        return $this;
        PHP;
        $method->addBody($body);

        // add getSelectionSet
        $class->addMethod('getSelectionSet')
            ->setPublic()
            ->setReturnType($selectionType)
            ->addBody(\sprintf('return isset($this->selection) ? $this->selection : %s::new();', $selectionType));
    }

    private function addGraphqlClient(ClassType $class): void
    {
        $class->addProperty('graphqlClient')
            ->setPrivate()
            ->setType(GraphqlClient::class);

        $method = $class->addMethod('withClient')
            ->setPublic()
            ->setReturnType('self');

        $method->addParameter('graphqlClient')
            ->setType(GraphqlClient::class);

        $body = <<<'PHP'
        $clone = clone $this;
        $clone->graphqlClient = $graphqlClient;

        return $clone;
        PHP;

        $method->setBody($body);
    }

    private function addDoMethod(
        ClassType $class,
        Field $operation,
        Namespaced $namespace,
    ): void {
        $returnType = $operation->type->unwrap();
        [$_, $returnTypeName, $docblock] = $this->nameResolver->classNameWithNamespace($returnType, $namespace);

        // add do
        $method = $class->addMethod('do')
            ->setPublic()
            ->setReturnType($returnTypeName)
            ->setReturnNullable()
            ->setComment($docblock ? "@return $docblock" : null);

        $body = 'return $this->serializeResponse($this->graphqlClient->request($this));';
        $method->setBody($body);

        $method = $class->addMethod('serializeResponse')
            ->setPublic()
            ->setReturnType($returnTypeName)
            ->setReturnNullable()
            ->setComment($docblock ? "@return $docblock" : null);

        $method->addParameter('response')
            ->setType(Response::class);

        $body = <<<'PHP'
        if ($response->data === null) {
            return null;
        }
        
        return %s;
        PHP;
        $body = \sprintf($body, $this->addFromArraySerVar(
            $namespace,
            'data',
            $returnTypeName,
            null,
            $returnType,
            '$response->data',
            0,
        ));

        $method->setBody($body);
    }

    private function addOperationDdMethod(ClassType $class): void
    {
        $method = $class->addMethod('dd')
            ->setPublic()
            ->setReturnType('never');

        $body = <<<PHP
        \$content = new \\%s()->fromOperation(\$this);

        if (function_exists('dd')) {
            dd(\$content);
        }

        echo "<pre><br>\n";
        echo(\$content);
        echo "</pre><br>\n";
        exit(1);
        PHP;

        $body = \sprintf($body, QueryBuilder::class);

        $method->addBody($body);
    }

    /**
     * @return array{name: string, nullable: bool, type: string, docblock: ?string}[]
     */
    private function collectFieldFields(Field $field, Namespaced $namespace): array
    {
        $args = [];

        foreach ($field->args ?? [] as $arg) {
            [$nullable, $classname, $docblock] = $this->nameResolver->classNameWithNamespace($arg->type, $namespace);
            $args[] = [
                'name' => $arg->name,
                'nullable' => $nullable,
                'type' => $classname,
                'docblock' => $docblock,
            ];
        }

        usort($args, fn ($a, $b) => $a['nullable'] <=> $b['nullable']);

        return $args;
    }

    private function getNameResolver(): NameResolver
    {
        return $this->nameResolver;
    }

    private function getSchema(): Schema
    {
        return $this->schema;
    }
}
