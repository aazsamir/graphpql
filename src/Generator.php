<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql;

use Aazsamir\Graphpql\Model\GraphEnum;
use Aazsamir\Graphpql\Model\GraphObject;
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
use Nette\PhpGenerator\PhpFile;
use Nette\PhpGenerator\PhpNamespace;
use Nette\PhpGenerator\PsrPrinter;

class Generator
{
    private array $skip = [];

    public function generate(
        Schema $schema,
        string $namespace,
        string $outputDir
    ): void {
        $this->clearGenerated($outputDir);

        foreach ($schema->types as $type) {
            $this->generateType($type, $namespace, $outputDir);
        }

        foreach ($schema->queries as $query) {
            $this->generateQuery($schema, $query, $namespace, $outputDir);
        }
    }

    private function clearGenerated(string $outputDir): void
    {
        if (!is_dir($outputDir)) {
            mkdir($outputDir, 0777, true);
        }

        // remove all files in the output directory
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

    private function generateQuery(Schema $schema, Field $query, string $namespace, string $outputDir): void
    {
        dd($query);
        $name = \ucfirst($query->name);
        $class = new ClassType($name);
        $class->addImplement(Query::class);
        $class->addConstant('QUERY_NAME', $query->name);

        $returnType = $schema->findType($query->type->primary()->name);

        $selectionType = $this->generateSelectionSet($schema, $returnType, $namespace, $outputDir);

        $class->addProperty('selection')->setType($selectionType)->setPrivate();

        // add select
        $method = $class->addMethod('select')
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

        // add getName
        $class->addMethod('getName')
            ->setStatic()
            ->setPublic()
            ->setReturnType('string')
            ->addBody('return self::QUERY_NAME;');

        $this->saveFile($name, $namespace . '\\Query', $outputDir . '/Query', $class);
    }

    private function generateSelectionSet(Schema $schema, Type $type, string $namespace, string $outputDir): string
    {
        [$nullable, $classname, $docblock] = self::safeClassName($type, $namespace);

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
        [$nullable, $classname, $docblock] = self::safeClassName($type, $namespace);

        if ($classname === 'mixed') {
            return 'mixed';
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
                    throw new \Exception('shouldnt happen');
                    goto primitivepath;
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
                primitivepath:
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

        // add subSelect()
        $method = $class->addMethod('subSelect');
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

    private function generateType(Type $type, string $namespace, string $outputDir): void
    {
        if (self::shouldSkipType($type)) {
            return;
        }

        [$_, $name] = self::safeClassName($type, $namespace);

        if ($type->kind === TypeKind::ENUM) {
            $item = $this->generateEnum($type, $namespace);
        } else {
            $item = $this->generateClass($type, $namespace);
        }

        $this->saveFile($name, $namespace, $outputDir, $item);
    }

    private function generateEnum(Type $type, string $namespace): EnumType
    {
        [$_, $name] = self::safeClassName($type, $namespace);
        $enum = new EnumType($name);
        $enum->addImplement(GraphEnum::class);

        foreach ($type->enumValues as $enumValue) {
            $enum->addCase($enumValue->name);
        }

        return $enum;
    }

    private function generateClass(Type $type, string $namespace): ClassType
    {
        [$_, $name] = self::safeClassName($type, $namespace);
        $class = new ClassType(
            $name,
        );
        $class->addImplement(GraphObject::class);

        foreach ($type->fields as $field) {
            if ($name === null) {
                continue;
            }

            [$nullable, $classname, $docblock] = self::safeClassNameWithNamespace($field->type, $namespace);

            $class->addProperty($field->name)
                ->setType($classname)
                ->setNullable($nullable)
                ->setComment($docblock)
                ->setPublic();
        }

        foreach ($type->inputFields as $field) {
            [$nullable, $classname, $docblock] = self::safeClassNameWithNamespace($field->type, $namespace);

            $class->addProperty($field->name)
                ->setNullable($nullable)
                ->setComment($docblock)
                ->setType($classname)
                ->setPublic();
        }

        return $class;
    }

    private static function shouldSkipType(Type $type): bool
    {
        if ($type->kind === TypeKind::SCALAR) {
            return true;
        }

        return in_array(
            \strtolower($type->name),
            [
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
                $ofType = self::safeClassNameWithNamespace($type->ofType, $namespace)[1];
                $docblock = '@var array<' . $ofType . '>';

                return [false, 'array', $docblock];
            case TypeKind::NON_NULL:
                [$_, $children, $docblock] = self::safeClassNameWithNamespace($type->ofType, $namespace);
                return [true, $children, $docblock];
            case TypeKind::SCALAR:
                return [false, 'mixed', null];
        }

        if ($name === null) {
            dd($type, 'something wrong');
            return [false, null];
        }

        $name = self::safeName($name);

        switch (\strtolower($name)) {
            case 'timestamp':
            case 'time':
                return [false, '\\' . \DateTimeInterface::class, null];
            case 'int64':
                return [false, 'int', null];
            case 'id':
                return [false, 'string', null];
            case 'boolean':
                return [false, 'bool', null];
            case 'string':
            case 'int':
            case 'float':
            case 'bool':
                return [false, \strtolower($name), null];
        }

        $name = ucfirst($name);

        return [false, $name, null];
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
