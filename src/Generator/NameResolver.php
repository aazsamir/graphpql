<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Generator;

use Aazsamir\Graphpql\Schema\Schema;
use Aazsamir\Graphpql\Schema\Type;
use Aazsamir\Graphpql\Schema\TypeKind;

class NameResolver
{
    use TypeSkip;

    public function __construct(
        private Schema $schema,
    ) {}

    public function safeName(string $name): string
    {
        $name = preg_replace('/[^a-zA-Z0-9]/', 'x', $name);

        return $name;
    }

    public function className(Type $type, Namespaced $namespace, bool $skipContainers = false): array
    {
        $name = $type->name;

        if ($skipContainers === false) {
            switch ($type->kind) {
                case TypeKind::LIST:
                    [$nullable, $classname, $docblock] = $this->classNameWithNamespace($type->ofType, $namespace);

                    if ($docblock) {
                        $docblock = 'array<' . $docblock . '>';
                    } else {
                        $docblock = 'array<' . $classname . '>';
                    }

                    // TODO: we assume that every array may be nullable
                    return [true, 'array', $docblock];
                case TypeKind::NON_NULL:
                    [$_, $children, $docblock] = $this->classNameWithNamespace($type->ofType, $namespace);
                    return [false, $children, $docblock];
                case TypeKind::UNION:
                    $types = [];
                    foreach ($this->schema->findType($name)->possibleTypes ?? [] as $possibleType) {
                        $possibleType = $this->schema->findType($possibleType->name);
                        [$_, $possibleTypeName, $_] = $this->classNameWithNamespace($possibleType, $namespace);
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

    public function classNameWithNamespace(Type $type, Namespaced $namespace): array
    {
        [$nullable, $classname, $docblock] = $this->className($type, $namespace);

        if (
            $type->kind === TypeKind::LIST
            || $type->kind === TypeKind::NON_NULL
            || $this->shouldSkipType($type)
        ) {
            return [$nullable, $classname, $docblock];
        }

        return [$nullable, $namespace->add($classname)->toString(), $docblock];
    }
}
