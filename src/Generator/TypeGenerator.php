<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Generator;

use Aazsamir\Graphpql\Model\GraphEnum;
use Aazsamir\Graphpql\Model\GraphObject;
use Aazsamir\Graphpql\Schema\Schema;
use Aazsamir\Graphpql\Schema\Type;
use Aazsamir\Graphpql\Schema\TypeKind;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\EnumType;

class TypeGenerator
{
    use TypeSkip;

    public function __construct(
        private Schema $schema,
        private NameResolver $nameResolver,
        private FileAccess $fileAccess,
        private SelectionSetGenerator $selectionSetGenerator,
    ) {}

    public function generateType(Type $type, Namespaced $namespace, string $outputDir): void
    {
        if ($this->shouldSkipType($type)) {
            return;
        }

        [$_, $name] = $this->nameResolver->className($type, $namespace);

        if ($type->kind === TypeKind::ENUM) {
            $item = $this->generateEnum($type, $namespace);
        } else {
            $item = $this->generateClass($type, $namespace, $outputDir);
        }

        $this->fileAccess->saveFile($name, $namespace, $outputDir, $item);
    }

    private function generateEnum(Type $type, Namespaced $namespace): EnumType
    {
        [$_, $name] = $this->nameResolver->className($type, $namespace);
        $enum = new EnumType($name);
        $enum->addImplement(GraphEnum::class);
        $enum->setType('string');

        foreach ($type->enumValues as $enumValue) {
            $case = $enum->addCase($enumValue->name, $enumValue->name);

            if ($enumValue->isDeprecated) {
                $case->addComment('@deprecated ' . $enumValue->deprecationReason);
            }
        }

        return $enum;
    }

    private function generateClass(Type $type, Namespaced $namespace, string $outputDir): ClassType
    {
        [$_, $name] = $this->nameResolver->className($type, $namespace);
        $class = new ClassType(
            $name,
        );
        $class->addImplement(GraphObject::class);
        $class->addTrait('Aazsamir\Graphpql\Model\ToArray');
        $this->addProperties($type, $namespace, $class);
        $this->addFastFieldAccessors($type, $namespace, $class, $outputDir);
        $this->addNewMethod($type, $namespace, $class);
        $this->addFromArrayMethod($type, $namespace, $class);

        return $class;
    }

    private function addProperties(Type $type, Namespaced $namespace, ClassType $class): void
    {
        foreach ($type->fields as $field) {
            [$nullable, $classname, $docblock] = $this->nameResolver->classNameWithNamespace($field->type, $namespace);

            $class->addProperty($field->name)
                ->setType($classname)
                ->setNullable($nullable)
                ->setComment($docblock ? ('@var ' . $docblock) : null)
                ->setPublic();
        }

        foreach ($type->inputFields as $field) {
            [$nullable, $classname, $docblock] = $this->nameResolver->classNameWithNamespace($field->type, $namespace);

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
            [$_, $selfClassname, $_] = $this->nameResolver->classNameWithNamespace($type, $namespace->add('Fields'));

            $primaryType = $field->type->primary();

            if ($primaryType->kind->isAny(TypeKind::INPUT_OBJECT, TypeKind::OBJECT, TypeKind::UNION)) {
                $childSelection = $this->selectionSetGenerator->generateSelectionSet(
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

    private function addNewMethod(Type $type, Namespaced $namespace, ClassType $class): void
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

    private function addFromArrayMethod(Type $type, Namespaced $namespace, ClassType $class): void
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
                [$_, $classname, $_] = $this->nameResolver->classNameWithNamespace($type->ofType, $namespace);
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
                [$_, $possibleTypeClassname, $_] = $this->nameResolver->classNameWithNamespace($possibleType, $namespace);
                $conditionals = sprintf(
                    $conditionals,
                    Pad::multipad(
                        "(\$data['__typename'] ?? '') === '{$possibleType->name}'\n? (%s)\n: (%s)",
                        $loopIndent,
                    ),
                );
                $conditionals = sprintf(
                    $conditionals, $this->addFromArraySerVar(
                        $namespace,
                        $fieldName,
                        $possibleTypeClassname,
                        null,
                        $possibleType,
                        $source,
                        $indent + 1,
                    ),
                    '%s',
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
                    return [];
                }

                return %s;
            }, {$source} ?? [])
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
            [$nullable, $classname, $docblock] = $this->nameResolver->classNameWithNamespace($field->type, $namespace);

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
}
