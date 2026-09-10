<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql;

use Aazsamir\Graphpql\Client\GraphqlClient;
use Aazsamir\Graphpql\Client\QueryBuilder;
use Aazsamir\Graphpql\Generator\FileAccess;
use Aazsamir\Graphpql\Generator\Namespaced;
use Aazsamir\Graphpql\Generator\Pad;
use Aazsamir\Graphpql\Model\GraphEnum;
use Aazsamir\Graphpql\Model\GraphObject;
use Aazsamir\Graphpql\Model\Mutation;
use Aazsamir\Graphpql\Model\ObjectField;
use Aazsamir\Graphpql\Model\Query;
use Aazsamir\Graphpql\Model\SelectionSet;
use Aazsamir\Graphpql\Schema\Field;
use Aazsamir\Graphpql\Schema\Schema;
use Aazsamir\Graphpql\Schema\Type;
use Aazsamir\Graphpql\Schema\TypeKind;
use Nette\PhpGenerator\ClassLike;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\EnumType;
use Nette\PhpGenerator\Method;

class GraphqlGenerator
{
    private array $skip = [];
    private Schema $schema;

    public function __construct(
        private FileAccess $fileAccess,
    ) {}

    public static function default(): self
    {
        return new self(new FileAccess);
    }

    public function generate(
        Schema $schema,
        string $namespace,
        string $outputDir
    ): void {
        $this->schema = $schema;
        $namespace = new Namespaced($namespace);
        $this->fileAccess->ensureClearDir($outputDir);

        foreach ($schema->types as $type) {
            $this->generateType($type, $namespace, $outputDir);
        }

        foreach ($schema->queries as $query) {
            $this->generateOperation($query, $namespace, $outputDir, Query::class, 'Query');
        }

        foreach ($schema->mutations as $mutation) {
            $this->generateOperation($mutation, $namespace, $outputDir, Mutation::class, 'Mutation');
        }

        $this->generateApi($namespace, $outputDir);
    }

    private function generateApi(Namespaced $namespace, string $outputDir): void
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
            }
        }

        $this->saveFile('Api', $namespace, $outputDir, $class);
    }

    private function generateType(Type $type, Namespaced $namespace, string $outputDir): void
    {
        if ($this->shouldSkipType($type)) {
            return;
        }

        [$_, $name] = $this->safeClassName($type, $namespace);

        if ($type->kind === TypeKind::ENUM) {
            $item = $this->generateEnum($type, $namespace);
        } else {
            $item = $this->generateClass($type, $namespace, $outputDir);
        }

        $this->saveFile($name, $namespace, $outputDir, $item);
    }

    private function generateEnum(Type $type, Namespaced $namespace): EnumType
    {
        [$_, $name] = $this->safeClassName($type, $namespace);
        $enum = new EnumType($name);
        $enum->addImplement(GraphEnum::class);
        $enum->setType('string');

        foreach ($type->enumValues as $enumValue) {
            $enum->addCase($enumValue->name, $enumValue->name);
        }

        return $enum;
    }

    private function generateClass(Type $type, Namespaced $namespace, string $outputDir): ClassType
    {
        [$_, $name] = $this->safeClassName($type, $namespace);
        $class = new ClassType(
            $name,
        );
        $class->addImplement(GraphObject::class);
        $class->addTrait('Aazsamir\Graphpql\Model\ToArray');
        $this->addTypeProperties($type, $namespace, $class);
        $this->addFastFieldAccessors($type, $namespace, $class, $outputDir);
        $this->addTypeNewMethod($type, $namespace, $class);
        $this->addTypeFromArrayMethod($type, $namespace, $class);

        return $class;
    }

    private function addTypeProperties(Type $type, Namespaced $namespace, ClassType $class): void
    {
        foreach ($type->fields ?? [] as $field) {
            [$nullable, $classname, $docblock] = $this->safeClassNameWithNamespace($field->type, $namespace);

            $class->addProperty($field->name)
                ->setType($classname)
                ->setNullable($nullable)
                ->setComment($docblock ? ('@var ' . $docblock) : null)
                ->setPublic();
        }

        foreach ($type->inputFields ?? [] as $field) {
            [$nullable, $classname, $docblock] = $this->safeClassNameWithNamespace($field->type, $namespace);

            $class->addProperty($field->name)
                ->setNullable($nullable)
                ->setComment($docblock ? ('@var ' . $docblock) : null)
                ->setType($classname)
                ->setPublic();
        }
    }

    private function addFastFieldAccessors(Type $type, Namespaced $namespace, ClassType $class, string $outputDir): void
    {
        // add fast field accessors
        foreach ($type->fields as $field) {
            [$_, $selfClassname, $_] = $this->safeClassNameWithNamespace($type, $namespace->add('Fields'));

            $primaryType = $field->type->primary();

            if ($primaryType->kind->isAny(TypeKind::INPUT_OBJECT, TypeKind::OBJECT, TypeKind::UNION)) {
                $childSelection = $this->generateSelectionSet(
                    $this->schema->findType($primaryType->name),
                    $namespace,
                    $outputDir
                );
            } else {
                $childSelection = 'mixed';
            }

            $fieldClassname = $selfClassname . 'Field';
            $method = $class->addMethod($field->name)
                ->setStatic()
                ->setPublic()
                ->setReturnType($fieldClassname)
                ->setComment("@return {$fieldClassname}<{$childSelection}>");

            $body = <<<PHP
            return {$fieldClassname}::{$field->name}();
            PHP;
            $method->addBody($body);
        }
    }

    private function addTypeNewMethod(Type $type, Namespaced $namespace, ClassType $class): void
    {
        // add new
        $method = $class->addMethod('new', true)
            ->setStatic()
            ->setPublic()
            ->setReturnType('self');

        $body = <<<'PHP'
            $self = new self();

        PHP;

        foreach ($this->collectTypeFields($type, $namespace) as $field) {
            $parameter = $method->addParameter($field['name'])
                ->setType($field['type'])
                ->setNullable($field['nullable']);

            if ($field['nullable']) {
                $parameter->setDefaultValue(null);
            }

            if ($field['docblock']) {
                $method->addComment('@param ' . $field['docblock'] . ' $' . $field['name']);
            }

            $body .= "\$self->{$field['name']} = \${$field['name']};\n";
        }

        $body .= "\nreturn \$self;";

        $method->addBody($body);
    }

    private function addTypeFromArrayMethod(Type $type, Namespaced $namespace, ClassType $class): void
    {
        // add fromArray
        $method = $class->addMethod('fromArray')
            ->setStatic()
            ->setPublic()
            ->setReturnType('self');

        $method->addParameter('data')
            ->setType('array');

        $body = <<<'PHP'
        $self = new self();

        PHP;

        foreach ($this->collectTypeFields($type, $namespace) as $field) {
            $body .= 'if (isset($data[\'' . $field['name'] . '\'])) {' . "\n";
            $body .= '    $self->' . $field['name'] . ' = ';
            $body .= $this->addFromArraySerVar(
                $namespace,
                $field['name'],
                $field['type'],
                $field['docblock'],
                $field['fieldType'],
                "\$data['{$field['name']}']",
                1
            );
            $body .= ";\n";

            $body .= "}\n";
        }

        $body .= "\n";
        $body .= 'return $self;';
        $method->addBody($body);
    }

    private function addFromArraySerVar(
        Namespaced $namespace,
        string $fieldName,
        string $fieldType,
        ?string $fieldDocblock,
        Type $type,
        string $source,
        int $indent = 0
    ): string {
        if ($type->kind->isAny(TypeKind::NON_NULL)) {
            if ($type->ofType->kind->isAny(TypeKind::LIST)) {
                $classname = 'array';
            } else {
                [$_, $classname, $_] = $this->safeClassNameWithNamespace($type->ofType, $namespace);
            }

            return $this->addFromArraySerVar(
                $namespace,
                $fieldName,
                $classname,
                $fieldDocblock,
                $type->ofType,
                $source,
                $indent,
            );
        }

        if ($type->kind->isAny(TypeKind::UNION)) {
            $conditionals = '%s';
            $primary = $this->schema->findType($type->name);

            $loopIndent = 0;

            foreach ($primary->possibleTypes ?? [] as $possibleType) {
                $possibleType = $this->schema->findType($possibleType->name);
                [$_, $possibleTypeClassname, $_] = $this->safeClassNameWithNamespace($possibleType, $namespace);
                $conditionals = sprintf(
                    $conditionals,
                    Pad::multipad(
                        "self::conditionalIf(\n\$data['__typename'] === '{$possibleType->name}',\nfn () => {$possibleTypeClassname}::fromArray(\$data),\nfn () => %s\n)",
                        $loopIndent,
                    ),
                );
                $loopIndent += 1;
            }

            $conditionals = sprintf($conditionals, 'null');

            $body = Pad::multipad($conditionals, 1);
            $body = sprintf($body, $conditionals);
            $body = Pad::multipad($body, 1);

            return $body;
        }

        if ($fieldType === 'array') {
            $fieldDocblock = \preg_replace('/array</', '', $fieldDocblock ?? '', 1);
            $fieldDocblock = substr($fieldDocblock, 0, -1);

            $body = <<<PHP
            array_map(function (\$data) {
                if (\$data === []) {
                    return null;
                }

                return %s;
            }, {$source} ?? []);
            PHP;

            $body = Pad::multipad($body, $indent);
            $body = sprintf($body, $this->addFromArraySerVar(
                $namespace,
                $fieldName,
                $fieldDocblock,
                null,
                $type->ofType,
                '$data',
                $indent + 1
            ));

            return $body;
        } elseif (\strtolower($fieldType) === $fieldType) {
            // a bit dumb, but, it means it is a primitive
            return "$source";
        } elseif ($fieldType === '\DateTimeInterface') {
            return "new \DateTimeImmutable($source)";
        } elseif ($type->primary()->kind === TypeKind::ENUM) {
            return $fieldType . "::from($source)";
        } else {
            return $fieldType . "::fromArray($source)";
        }
    }

    /**
     * @return array{
     *   name: string,
     *   type: string,
     *   nullable: bool,
     *   docblock: ?string,
     *   fieldType: Type,
     *   input: bool,
     * }[]
     */
    private function collectTypeFields(Type $type, Namespaced $namespace): array
    {
        $fields = [];

        foreach (array_merge($type->fields, $type->inputFields) as $field) {
            [$nullable, $classname, $docblock] = $this->safeClassNameWithNamespace($field->type, $namespace);

            $fields[] = [
                'name' => $field->name,
                'type' => $classname,
                'nullable' => $nullable,
                'docblock' => $docblock,
                'fieldType' => $field->type,
                'input' => true,
            ];
        }

        usort($fields, fn($a, $b) => $a['nullable'] <=> $b['nullable']);

        return $fields;
    }

    /**
     * @return array{name: string, nullable: bool, type: string, docblock: ?string}[]
     */
    private function collectFieldFields(Field $field, Namespaced $namespace): array
    {
        $args = [];

        foreach ($field->args ?? [] as $arg) {
            [$nullable, $classname, $docblock] = $this->safeClassNameWithNamespace($arg->type, $namespace);
            $args[] = [
                'name' => $arg->name,
                'nullable' => $nullable,
                'type' => $classname,
                'docblock' => $docblock,
            ];
        }

        usort($args, fn($a, $b) => $a['nullable'] <=> $b['nullable']);

        return $args;
    }

    private function generateSelectionSet(Type $type, Namespaced $namespace, string $outputDir): string
    {
        [$_, $classname, $_] = $this->safeClassName($type->primary(), $namespace, true);

        if ($classname === 'mixed') {
            return 'mixed';
        }

        $classname .= 'SelectionSet';
        $fullname = $namespace->add('SelectionSet')->add($classname)->toString();

        if (\in_array($fullname, $this->skip)) {
            return $fullname;
        }

        $this->skip[] = $fullname;

        $class = new ClassType($classname);
        $class->addImplement(SelectionSet::class);

        $this->addSelectionSetNewMethod($class);
        $this->addSelectionSetSelection($type, $namespace, $class, $outputDir);

        $this->saveFile($classname, $namespace->add('SelectionSet'), $outputDir . '/SelectionSet', $class);

        return $fullname;
    }

    private function addSelectionSetNewMethod(ClassType $class): void
    {
        // add new
        $class->addMethod('new')
            ->setStatic()
            ->setPublic()
            ->setReturnType('self')
            ->addBody('return new self();');
    }

    private function addSelectionSetSelection(Type $type, Namespaced $namespace, ClassType $class, string $outputDir): void
    {
        $class->addProperty('selection', [])->setType('array')->setPrivate();
        $fieldSetType = $this->generateFieldSet($type, $namespace, $outputDir);

        $method = $class->addMethod('select')
            ->setPublic()
            ->setReturnType('self');

        $method
            ->setVariadic()
            ->addParameter('selection')
            ->setType($fieldSetType);

        $body = <<<PHP
        \$this->selection = \$selection;

        return \$this;
        PHP;
        $method->addBody($body);

        // add getSelection
        $class->addMethod('getSelection')
            ->setPublic()
            ->setReturnType('array')
            ->addBody('return $this->selection;')
            ->addComment('@return ' . $fieldSetType . '[]');
    }

    private function generateFieldSet(Type $type, Namespaced $namespace, string $outputDir): string
    {
        [$_, $classname, $_] = $this->safeClassName($type, $namespace, true);

        if ($classname === 'mixed') {
            throw new \Exception('Unreachable');
        }

        $classname .= 'Field';
        $fullname = $namespace->add('Fields')->add($classname)->toString();

        if (in_array($fullname, $this->skip)) {
            return $fullname;
        }

        $this->skip[] = $fullname;

        $class = new ClassType($classname);
        $class->addImplement(ObjectField::class);
        $comment = '@template T';
        $class->addComment($comment);

        $class->addProperty('name')->setType('string')->setPrivate();
        $class->addProperty('child')->setType(SelectionSet::class)->setPrivate();
        $class->addProperty('union')->setType('?string')->setPrivate()->setValue(null);

        foreach ($type->fields ?? [] as $field) {
            $docblock = '@return self<mixed>';

            if ($field->type->primary()->kind->isAny(TypeKind::INPUT_OBJECT, TypeKind::OBJECT, TypeKind::UNION)) {
                $childSelection = $this->generateSelectionSet($this->schema->findType($field->type->primary()->name), $namespace, $outputDir);

                if ($childSelection === 'mixed') {
                    throw new \Exception('Unreachable');
                }

                $body = <<<PHP
                \$instance = new self();
                \$instance->name = '$field->name';
                \$instance->child = new {$childSelection}();

                return \$instance;
                PHP;

                $docblock = "@return self<$childSelection>";
            } else {
                $body = <<<PHP
                \$instance = new self();
                \$instance->name = '$field->name';

                return \$instance;
                PHP;
            }

            $method = $class->addMethod($field->name)
                ->setStatic()
                ->setReturnType('self')
                ->addBody($body);

            if ($docblock) {
                $method->addComment($docblock);
            }
        }

        if ($type->primary()->kind->isAny(TypeKind::UNION)) {
            foreach ($this->schema->findType($type->primary()->name)->possibleTypes ?? [] as $possibleType) {
                [$_, $possibleTypeClassname, $_] = $this->safeClassNameWithNamespace($possibleType, $namespace->add('SelectionSet'));
                $possibleTypeClassname .= 'SelectionSet';
                $method = $class->addMethod('on' . $possibleType->name)
                    ->setReturnType('self')
                    ->setStatic();

                $body = <<<PHP
                \$instance = new self();
                \$instance->child = new {$possibleTypeClassname}();
                \$instance->union = '{$possibleType->name}';

                return \$instance;
                PHP;
                $method->setBody($body);
                $method->addComment("@return self<$possibleTypeClassname>");
            }
        }

        // add selector()
        $method = $class->addMethod('selector');
        $method
            ->setPublic()
            ->setReturnType('self');
        $method->addParameter('selection')->setType('callable');
        $method->addComment('@param callable(T): void $selection');
        $body = <<<PHP
        \$selection(\$this->child);

        return \$this;
        PHP;
        $method->addBody($body);

        // add getName
        $method = $class->addMethod('getName')
            ->setPublic()
            ->setReturnType('string')
            ->addBody('return $this->name;');

        $body = <<<'PHP'
        if (isset($this->child)) {
            return $this->child;
        }

        return null;
        PHP;

        // add getChild
        $method = $class->addMethod('getChild')
            ->setPublic()
            ->setReturnType('?' . SelectionSet::class)
            ->addBody($body);

        // add getUnion
        $class->addMethod('getUnion')
            ->setPublic()
            ->setReturnType('?string')
            ->setBody('return $this->union;');

        $this->saveFile(
            $classname,
            $namespace->add('Fields'),
            $outputDir . '/Fields',
            $class,
        );

        return $fullname;
    }

    private function generateOperation(
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

        $this->saveFile($name, $namespace->add($namespaceSuffix), $outputDir . "/" . $namespaceSuffix, $class);
    }

    private function addConstructor(ClassType $class): Method
    {
        return $class->addMethod('__construct')->setPublic();
    }

    private function createOperationClass(
        Field $operation,
        Namespaced $namespace,
        string $interface
    ): ClassType {
        $name = $this->getOperationClassname($operation);

        $class = new ClassType($name);
        $class->addImplement($interface);
        $class->addConstant("NAME", $operation->name);

        $returnTypeName = $this->getOperationReturnType($operation, $namespace);
        $class->addConstant("RETURN_TYPE", $returnTypeName);

        // add getName
        $class->addMethod('getName')
            ->setStatic()
            ->setPublic()
            ->setReturnType('string')
            ->addBody("return self::NAME;");

        // add getReturnType
        $class->addMethod('getReturnType')
            ->setStatic()
            ->setPublic()
            ->setReturnType('string')
            ->addBody("return self::RETURN_TYPE;");

        return $class;
    }

    private function getOperationReturnType(Field $operation, Namespaced $namespace): string
    {
        $returnType = $this->schema->findType($operation->type->primary()->name);
        [$_, $returnTypeName, $_] = $this->safeClassNameWithNamespace($returnType, $namespace);

        return $returnTypeName;
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
        $selectionType = $this->generateSelectionSet(
            $returnType,
            $namespace,
            $outputDir,
        );

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

        $body = <<<PHP
        \$this->selection = \$selection;

        return \$this;
        PHP;
        $method->addBody($body);

        // add getSelectionSet
        $class->addMethod('getSelectionSet')
            ->setPublic()
            ->setReturnType($selectionType)
            ->addBody('return $this->selection;');
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
        Field $query,
        Namespaced $namespace,
    ): void {
        $returnTypeName = $this->getOperationReturnType($query, $namespace);
        $isArray = $query->type->isArray();

        // add do
        $method = $class->addMethod('do')
            ->setPublic()
            ->setReturnType($returnTypeName)
            ->setReturnNullable();

        $body = <<<'PHP'
        $response = $this->graphqlClient->request($this);

        if ($response->data === null) {
            return null;
        }

        $returnType = self::getReturnType();

        PHP;

        if ($isArray) {
            $body .= <<<'PHP'

            return array_map(fn ($x) => $returnType::fromArray($x), $response->data);
            PHP;
            $method->setReturnType('array');
            $method->addComment("@return array<$returnTypeName>");
        } else {
            $body .= 'return $returnType::fromArray($response->data);';
        }

        $method->setBody($body);
    }

    private function addOperationDdMethod(ClassType $class): void
    {
        $method = $class->addMethod('dd')
            ->setPublic()
            ->setReturnType('never');

        $body = <<<PHP
        \$content = new \%s()->fromOperation(\$this);

        if (function_exists('dd')) {
            dd(\$content);
        }

        echo "<pre><br>\n";
        echo(\$content);
        echo "</pre><br>\n";
        exit(1);
        PHP;

        $body = sprintf($body, QueryBuilder::class);

        $method->addBody($body);
    }

    private function shouldSkipType(Type $type): bool
    {
        if ($type->kind === TypeKind::SCALAR) {
            return true;
        }

        if ($type->kind === TypeKind::UNION) {
            return true;
        }

        return $this->isPrimitive($type->name)
            || $this->isNativeGraphType($type->name);
    }

    private function isPrimitive(string $name): bool
    {
        return in_array(
            \strtolower($name),
            [
                'string',
                'int',
                'int64',
                'float',
                'bool',
                'boolean',
                'id',
            ],
        );
    }

    private function isNativeGraphType(string $name): bool
    {
        return in_array(
            \strtolower($name),
            [
                '__directive',
                '__directivelocation',
                '__enumvalue',
                '__field',
                '__inputvalue',
                '__schema',
                '__type',
                '__typekind',
                'query',
                'mutation',
                'subscription',
                'time',
                'timestamp',
            ],
        );
    }

    public function safeName(string $name): string
    {
        $name = preg_replace('/[^a-zA-Z0-9]/', 'x', $name);

        return $name;
    }

    public function safeClassName(Type $type, Namespaced $namespace, bool $skipContainers = false): array
    {
        $name = $type->name;

        if ($skipContainers === false) {
            switch ($type->kind) {
                case TypeKind::LIST:
                    [$nullable, $classname, $docblock] = $this->safeClassNameWithNamespace($type->ofType, $namespace);

                    if ($docblock) {
                        $docblock = 'array<' . $docblock . '>';
                    } else {
                        $docblock = 'array<' . $classname . '>';
                    }

                    // TODO: we assume that every array may be nullable
                    return [true, 'array', $docblock];
                case TypeKind::NON_NULL:
                    [$_, $children, $docblock] = $this->safeClassNameWithNamespace($type->ofType, $namespace);
                    return [false, $children, $docblock];
                case TypeKind::UNION:
                    $types = [];
                    foreach ($this->schema->findType($name)->possibleTypes ?? [] as $possibleType) {
                        $possibleType = $this->schema->findType($possibleType->name);
                        [$_, $possibleTypeName, $_] = $this->safeClassNameWithNamespace($possibleType, $namespace);
                        $types[] = $possibleTypeName;
                    }

                    return [false, implode('|', $types), null];
            }
        }

        if ($name === null) {
            throw new \Exception('Unreachable');
        }

        $name = $this->safeName($name);

        switch (\strtolower($name)) {
            case 'timestamp':
            case 'time':
                return [true, '\\' . \DateTimeInterface::class, null];
            case 'int64':
                return [true, 'int', null];
            case 'id':
                return [true, 'string', null];
            case 'boolean':
                return [true, 'bool', null];
            case 'string':
            case 'int':
            case 'float':
            case 'bool':
                return [true, \strtolower($name), null];
        }

        if ($type->kind === TypeKind::SCALAR) {
            return [true, 'mixed', null];
        }

        $name = ucfirst($name);

        return [true, $name, null];
    }

    private function safeClassNameWithNamespace(Type $type, Namespaced $namespace): array
    {
        [$nullable, $classname, $docblock] = $this->safeClassName($type, $namespace);

        if (
            $type->kind === TypeKind::LIST
            || $type->kind === TypeKind::NON_NULL
            || $this->shouldSkipType($type)
        ) {
            return [$nullable, $classname, $docblock];
        }

        return [$nullable, $namespace->add($classname)->toString(), $docblock];
    }

    private function saveFile(string $name, Namespaced $namespace, string $outputDir, ClassLike $item): void
    {
        $this->fileAccess->saveFile($name, $namespace, $outputDir, $item);
    }
}
