<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql;

use Aazsamir\Graphpql\Client\GraphqlClient;
use Aazsamir\Graphpql\Client\QueryBuilder;
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
use Nette\PhpGenerator\PhpFile;
use Nette\PhpGenerator\PhpNamespace;
use Nette\PhpGenerator\PsrPrinter;

class GraphqlGenerator
{
    private array $skip = [];

    public function generate(
        Schema $schema,
        string $namespace,
        string $outputDir
    ): void {
        $this->clearGenerated($outputDir);

        foreach ($schema->types as $type) {
            $this->generateType($schema, $type, $namespace, $outputDir);
        }

        foreach ($schema->queries as $query) {
            $this->generateQuery($schema, $query, $namespace, $outputDir);
        }

        foreach ($schema->mutations as $mutation) {
            $this->generateMutation($schema, $mutation, $namespace, $outputDir);
        }

        $this->generateApi($schema, $namespace, $outputDir);
    }

    private function clearGenerated(string $outputDir): void
    {
        if (!is_dir($outputDir)) {
            mkdir($outputDir, 0777, true);
        }

        self::rrmdir($outputDir);
    }

    private static function rrmdir(string $dir): void
    {
        if (is_dir($dir)) {
            $objects = scandir($dir);

            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (is_dir($dir . DIRECTORY_SEPARATOR . $object) && !is_link($dir . "/" . $object)) {
                        self::rrmdir($dir . DIRECTORY_SEPARATOR . $object);
                    } else {
                        unlink($dir . DIRECTORY_SEPARATOR . $object);
                    }
                }
            }

            rmdir($dir);
        }
    }

    private function generateApi(Schema $schema, string $namespace, string $outputDir): void
    {
        $class = new ClassType('Api');

        $constructor = $this->addConstructor($class);

        $constructor
            ->addPromotedParameter('graphqlClient')
            ->setType(GraphqlClient::class);

        foreach ($schema->queries as $query) {
            $classname = $this->getOperationClassname($query);
            $method = $class->addMethod($query->name);
            $this->addOperationArgsToMethod($method, $query, $namespace, false);
            $args = $this->getOperationConstructorArgs($query, $namespace);

            if ($args == []) {
                $body = "\$query = new {$namespace}\Query\{$classname}();";
            }

            $body = "\$query = new {$namespace}\\Query\\{$classname}(\n";

            foreach ($this->getOperationConstructorArgs($query, $namespace) as $arg) {
                $body .= "    \${$arg['name']},\n";
            }

            $body .= ");\n\n";
            $body .= 'return $query->withClient($this->graphqlClient);';
            $method->addBody($body);

            $queryTypeName = $namespace . '\\Query\\' . $classname; 

            $method->setReturnType($queryTypeName);
        }

        foreach ($schema->mutations as $mutation) {
            $classname = $this->getOperationClassname($mutation);
            $method = $class->addMethod($mutation->name);
            $this->addOperationArgsToMethod($method, $mutation, $namespace, false);
            $args = $this->getOperationConstructorArgs($mutation, $namespace);

            if ($args == []) {
                $body = "\$mutation = new {$namespace}\Mutation\{$classname}();";
            }

            $body = "\$mutation = new {$namespace}\\Mutation\\{$classname}(\n";

            foreach ($this->getOperationConstructorArgs($mutation, $namespace) as $arg) {
                $body .= "    \${$arg['name']},\n";
            }

            $body .= ");\n\n";
            $body .= 'return $mutation->withClient($this->graphqlClient);';
            $method->addBody($body);

            $mutationTypeName = $namespace . '\\Mutation\\' . $classname; 

            $method->setReturnType($mutationTypeName);
        }

        $this->saveFile('Api', $namespace, $outputDir, $class);
    }

    private function generateMutation(Schema $schema, Field $mutation, string $namespace, string $outputDir): void
    {
        $name = $this->getOperationClassname($mutation);
        $returnType = $schema->findType($mutation->type->primary()->name);

        $class = $this->createMutation($mutation, $schema, $namespace);

        $constructor = $this->addConstructor($class);
        $constructorArgs = $this->getOperationConstructorArgs($mutation, $namespace);

        $this->addOperationArgsToMethod($constructor, $mutation, $namespace);
        $this->addGetVarsMethod($class, $constructorArgs);
        $this->addSelectionMethods($class, $schema, $returnType, $namespace, $outputDir);
        $this->addGraphqlClient($class);
        $this->addDoMethod($class, $mutation, $schema, $namespace);
        $this->addOperationDdMethod($class);

        $this->saveFile($name, $namespace . '\\Mutation', $outputDir . '/Mutation', $class);
    }

    private function createMutation(Field $mutation, Schema $schema, string $namespace): ClassType
    {
        $name = $this->getOperationClassname($mutation);

        $class = new ClassType($name);
        $class->addImplement(Mutation::class);
        $class->addConstant('MUTATION_NAME', $mutation->name);

        $returnTypeName = $this->getQueryReturnType($mutation, $schema, $namespace);
        $class->addConstant('MUTATION_RETURN_TYPE', $returnTypeName);

        // add getName
        $class->addMethod('getName')
            ->setStatic()
            ->setPublic()
            ->setReturnType('string')
            ->addBody('return self::MUTATION_NAME;');

        // add getReturnType
        $class->addMethod('getReturnType')
            ->setStatic()
            ->setPublic()
            ->setReturnType('string')
            ->addBody('return self::MUTATION_RETURN_TYPE;');

        return $class;
    }

    private function generateQuery(Schema $schema, Field $query, string $namespace, string $outputDir): void
    {
        $name = $this->getOperationClassname($query);
        $returnType = $schema->findType($query->type->primary()->name);

        $class = $this->createQuery($query, $schema, $namespace);

        $constructor = $this->addConstructor($class);
        $constructorArgs = $this->getOperationConstructorArgs($query, $namespace);
        
        $this->addOperationArgsToMethod($constructor, $query, $namespace);
        $this->addGetVarsMethod($class, $constructorArgs);
        $this->addSelectionMethods($class, $schema, $returnType, $namespace, $outputDir);
        $this->addGraphqlClient($class);
        $this->addDoMethod($class, $query, $schema, $namespace);
        $this->addOperationDdMethod($class);

        $this->saveFile($name, $namespace . '\\Query', $outputDir . '/Query', $class);
    }

    private function createQuery(Field $query, Schema $schema, string $namespace): ClassType
    {
        $name = $this->getOperationClassname($query);

        $class = new ClassType($name);
        $class->addImplement(Query::class);
        $class->addConstant('QUERY_NAME', $query->name);

        $returnTypeName = $this->getQueryReturnType($query, $schema, $namespace);
        $class->addConstant('QUERY_RETURN_TYPE', $returnTypeName);

        // add getName
        $class->addMethod('getName')
            ->setStatic()
            ->setPublic()
            ->setReturnType('string')
            ->addBody('return self::QUERY_NAME;');

        // add getReturnType
        $class->addMethod('getReturnType')
            ->setStatic()
            ->setPublic()
            ->setReturnType('string')
            ->addBody('return self::QUERY_RETURN_TYPE;');

        return $class;
    }

    private function getOperationClassname(Field $query): string
    {
        return ucfirst($query->name);
    }

    private function addConstructor(ClassType $class): Method
    {
        return $class->addMethod('__construct')->setPublic();
    }

    /**
     * @return array{name: string, nullable: bool, type: string, docblock: ?string}[]
     */
    private function getOperationConstructorArgs(Field $query, string $namespace): array
    {
        $constructorArgs = [];

        foreach ($query->args ?? [] as $arg) {
            [$nullable, $classname, $docblock] = self::safeClassNameWithNamespace($arg->type, $namespace);
            $constructorArgs[] = [
                'name' => $arg->name,
                'nullable' => $nullable,
                'type' => $classname,
                'docblock' => $docblock,
            ];
        }

        usort($constructorArgs, fn ($a, $b) => $a['nullable'] <=> $b['nullable']);

        return $constructorArgs;
    }

    private function addOperationArgsToMethod(Method $method, Field $query, string $namespace, bool $promoted = true): void
    {
        $args = $this->getOperationConstructorArgs($query, $namespace);

        foreach ($args as $arg) {
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

    private function addGetVarsMethod(ClassType $class, array $args): void
    {
        $method = $class->addMethod('getVars')
            ->setPublic()
            ->setReturnType('array');

        $body = "return [\n";

        foreach ($args as $arg) {
            $body .= "    '{$arg['name']}' => \$this->{$arg['name']},\n";
        }

        $body .= '];';
        $method->addBody($body);
    }

    private function addSelectionMethods(
        ClassType $class,
        Schema $schema,
        Type $returnType,
        string $namespace,
        string $outputDir,
    ): void {
        $selectionType = $this->generateSelectionSet(
            $schema,
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
        Schema $schema,
        string $namespace,
    ): void {
        $returnTypeName = $this->getQueryReturnType($query, $schema, $namespace);
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

    private function getQueryReturnType(Field $query, Schema $schema, string $namespace): string
    {
        $returnType = $schema->findType($query->type->primary()->name);
        [$_, $returnTypeName, $_] = self::safeClassNameWithNamespace($returnType, $namespace);

        return $returnTypeName;
    }

    private function generateSelectionSet(Schema $schema, Type $type, string $namespace, string $outputDir): string
    {
        [$_, $classname, $_] = self::safeClassName($type, $namespace);

        if ($classname === 'mixed') {
            return 'mixed';
        }

        $classname .= 'SelectionSet';
        $fullname = $namespace . '\\' . 'SelectionSet' . '\\' . $classname;

        if (\in_array($fullname, $this->skip)) {
            return $fullname;
        }

        $this->skip[] = $fullname;

        $class = new ClassType($classname);
        $class->addImplement(SelectionSet::class);

        $class->addProperty('selection', [])->setType('array')->setPrivate();

        $method = $class->addMethod('select')
            ->setPublic()
            ->setReturnType('self');

        $selectionType = $this->generateFieldSet($schema, $type, $namespace, $outputDir);

        $method
            ->setVariadic()
            ->addParameter('selection')
            ->setType($selectionType);

        $body = <<<PHP
        \$this->selection = \$selection;

        return \$this;
        PHP;
        $method->addBody($body);

        // add new
        $class->addMethod('new')
            ->setStatic()
            ->setPublic()
            ->setReturnType('self')
            ->addBody('return new self();');

        // add getSelection
        $class->addMethod('getSelection')
            ->setPublic()
            ->setReturnType('array')
            ->addBody('return $this->selection;')
            ->addComment('@return ' . $selectionType . '[]');

        $this->saveFile($classname, $namespace . '\\SelectionSet', $outputDir . '/SelectionSet', $class);

        return $fullname;
    }

    private function generateFieldSet(Schema $schema, Type $type, string $namespace, string $outputDir)
    {
        [$_, $classname, $_] = self::safeClassName($type, $namespace);

        if ($classname === 'mixed') {
            throw new \Exception('Unreachable');
        }

        $classname .= 'Field';
        $fullname = $namespace . '\\' . 'Fields' . '\\' . $classname;

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

        foreach ($type->fields ?? [] as $field) {
            $docblock = '@return self<mixed>';

            if ($field->type->primary()->kind->isAny(TypeKind::INPUT_OBJECT, TypeKind::OBJECT)) {
                $childSelection = $this->generateSelectionSet($schema, $schema->findType($field->type->primary()->name), $namespace, $outputDir);

                if ($childSelection === 'mixed') {
                    throw new \Exception('Unreachable');
                }

                $returnType = 'self';
                $body = <<<PHP
                \$instance = new self();
                \$instance->name = '$field->name';
                \$instance->child = new {$childSelection}();

                return \$instance;
                PHP;

                $docblock = "@return self<$childSelection>";
            } else {
                $returnType = 'self';
                $body = <<<PHP
                \$instance = new self();
                \$instance->name = '$field->name';

                return \$instance;
                PHP;
            }

            $method = $class->addMethod($field->name)
                ->setStatic()
                ->setReturnType($returnType);
            $method->addBody($body);

            if ($docblock) {
                $method->addComment($docblock);
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

        $this->saveFile(
            $classname,
            $namespace . '\\' . 'Fields',
            $outputDir . '/Fields',
            $class,
        );

        return $fullname;
    }

    private function saveFile(string $name, string $namespace, string $outputDir, ClassLike $item): void
    {
        $namespaceItem = new PhpNamespace(ltrim($namespace, "\\"));

        $file = new PhpFile();
        $file->addNamespace($namespaceItem)->add($item);
        $file->setStrictTypes(true);
        $printer = new PsrPrinter();
        $printer->setTypeResolving(true);
        $filename = $outputDir . '/' . $name . '.php';

        if (!\is_dir(dirname($filename))) {
            mkdir(dirname($filename));
        }

        \file_put_contents($filename, $printer->printFile($file));
    }

    private function generateType(Schema $schema, Type $type, string $namespace, string $outputDir): void
    {
        if (self::shouldSkipType($type)) {
            return;
        }

        [$_, $name] = self::safeClassName($type, $namespace);

        if ($type->kind === TypeKind::ENUM) {
            $item = $this->generateEnum($type, $namespace);
        } else {
            $item = $this->generateClass($schema, $type, $namespace, $outputDir);
        }

        $this->saveFile($name, $namespace, $outputDir, $item);
    }

    private function generateEnum(Type $type, string $namespace): EnumType
    {
        [$_, $name] = self::safeClassName($type, $namespace);
        $enum = new EnumType($name);
        $enum->addImplement(GraphEnum::class);
        $enum->setType('string');

        foreach ($type->enumValues as $enumValue) {
            $enum->addCase($enumValue->name, $enumValue->name);
        }

        return $enum;
    }

    private function generateClass(Schema $schema, Type $type, string $namespace, string $outputDir): ClassType
    {
        [$_, $name] = self::safeClassName($type, $namespace);
        $class = new ClassType(
            $name,
        );
        $class->addImplement(GraphObject::class);
        $class->addTrait('Aazsamir\Graphpql\Model\ToArray');

        $fields = [];

        foreach ($type->fields as $field) {
            if ($name === null) {
                continue;
            }

            [$nullable, $classname, $docblock] = self::safeClassNameWithNamespace($field->type, $namespace);

            $fields[] = [
                'name' => $field->name,
                'type' => $classname,
                'nullable' => $nullable,
                'docblock' => $docblock,
                'fieldType' => $field->type,
                'input' => false,
            ];

            $class->addProperty($field->name)
                ->setType($classname)
                ->setNullable($nullable)
                ->setComment($docblock ? ('@var ' . $docblock) : null)
                ->setPublic();
        }

        foreach ($type->inputFields as $field) {
            [$nullable, $classname, $docblock] = self::safeClassNameWithNamespace($field->type, $namespace);

            $fields[] = [
                'name' => $field->name,
                'type' => $classname,
                'nullable' => $nullable,
                'docblock' => $docblock,
                'fieldType' => $field->type,
                'input' => true,
            ];

            $class->addProperty($field->name)
                ->setNullable($nullable)
                ->setComment($docblock ? ('@var ' . $docblock) : null)
                ->setType($classname)
                ->setPublic();
        }

        // add fast field accessors
        foreach ($fields as $field) {
            if ($field['input']) {
                continue;
            }

            [$_, $selfClassname, $_] = self::safeClassNameWithNamespace($type, $namespace . '\\Fields');

            $primaryType = $field['fieldType']->primary();

            if ($primaryType->kind->isAny(TypeKind::INPUT_OBJECT, TypeKind::OBJECT)) {
                $childSelection = $this->generateSelectionSet(
                $schema,
                $schema->findType($field['fieldType']->primary()->name), $namespace, $outputDir);
            } else {
                $childSelection = 'mixed';
            }

            $fieldClassname = $selfClassname . 'Field';
            $method = $class->addMethod($field['name'])
                ->setStatic()
                ->setPublic()
                ->setReturnType($fieldClassname)
                ->setComment("@return {$fieldClassname}<{$childSelection}>");

            $body = <<<PHP
            return {$fieldClassname}::{$field['name']}();
            PHP;
            $method->addBody($body);
        }

        // add new
        $method = $class->addMethod('new', true)
            ->setStatic()
            ->setPublic()
            ->setReturnType('self');

        $body = <<<'PHP'
            $self = new self();

        PHP;

        usort($fields, fn ($a, $b) => $a['nullable'] <=> $b['nullable']);

        foreach ($fields as $field) {
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
        foreach ($fields as $field) {
            $body .= 'if (isset($data[\'' . $field['name'] .'\'])) {' . "\n";
            $body .= '    $self->' . $field['name'] . ' = ';
            $body .= $this->addFromArraySerVar(
                $field['name'],
                $field['type'],
                $field['docblock'],
                $field['fieldType'],
                "\$data['{$field['name']}']",
            );
            $body .= ";\n";

            $body .= "}\n";
        }

        $body .= "\n";
        $body .= 'return $self;';
        $method->addBody($body);

        return $class;
    }

    private function addFromArraySerVar(string $fieldName, string $fieldType, ?string $fieldDocblock, Type $type, string $source): string
    {
        if ($fieldType === 'array') {
            $fieldDocblock = \preg_replace('/array</', '', $fieldDocblock, 1);
            $fieldDocblock = substr($fieldDocblock, 0, -1);

            return "array_map(fn (\$data) => " . $this->addFromArraySerVar(
                $fieldName,
                $fieldDocblock,
                null,
                $type,
                '$data',
            ) . ", {$source} ?? [])";
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

    private static function shouldSkipType(Type $type): bool
    {
        if ($type->kind === TypeKind::SCALAR) {
            return true;
        }

        return in_array(
            \strtolower($type->name),
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
                'string',
                'int',
                'int64',
                'float',
                'bool',
                'boolean',
                'id',
                'time',
                'timestamp',
            ]
        );
    }

    public static function safeName(string $name): string
    {
        $name = preg_replace('/[^a-zA-Z0-9]/', 'x', $name);

        return $name;
    }

    public static function safeClassName(Type $type, string $namespace): array
    {
        $name = $type->name;

        switch ($type->kind) {
            case TypeKind::LIST:
                [$nullable, $classname, $docblock] = self::safeClassNameWithNamespace($type->ofType, $namespace);

                if ($docblock) {
                    $docblock = 'array<' . $docblock . '>';
                } else {
                    $docblock = 'array<' . $classname . '>';
                }

                // TODO: we assume that every array may be nullable
                return [true, 'array', $docblock];
            case TypeKind::NON_NULL:
                [$_, $children, $docblock] = self::safeClassNameWithNamespace($type->ofType, $namespace);
                return [false, $children, $docblock];
        }

        if ($name === null) {
            dd($type, 'something wrong');
            return [true, null];
        }

        $name = self::safeName($name);

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

    private static function safeClassNameWithNamespace(Type $type, string $namespace): array
    {
        [$nullable, $classname, $docblock] = self::safeClassName($type, $namespace);

        if (
            $type->kind === TypeKind::LIST
            || $type->kind === TypeKind::NON_NULL
            || self::shouldSkipType($type)
        ) {
            return [$nullable, $classname, $docblock];
        }

        return [$nullable, '\\' . trim($namespace, "\\") . '\\' . $classname, $docblock];
    }
}
