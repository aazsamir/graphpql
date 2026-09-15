<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Generator;

use Aazsamir\Graphpql\Schema\Schema;
use Aazsamir\Graphpql\Schema\Type;
use Aazsamir\Graphpql\Schema\TypeKind;

trait FromArraySerVar
{
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
                [$_, $classname, $_] = $this->getNameResolver()->classNameWithNamespace($type->ofType, $namespace);
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

        if ($type->kind->isAny(TypeKind::UNION, TypeKind::INTERFACE)) {
            $conditionals = '%s';
            $primary = $this->getSchema()->findType($type->name);

            $loopIndent = 0;

            foreach ($primary->possibleTypes ?? [] as $possibleType) {
                $possibleType = $this->getSchema()->findType($possibleType->name);
                [$_, $possibleTypeClassname, $_] = $this->getNameResolver()->classNameWithNamespace($possibleType, $namespace);
                $conditionals = sprintf(
                    $conditionals,
                    Pad::multipad(
                        "({$source}['__typename'] ?? '') === '{$possibleType->name}'\n? (%s)\n: (%s)",
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

    abstract private function getNameResolver(): NameResolver;
    abstract private function getSchema(): Schema;
}