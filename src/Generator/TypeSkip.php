<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Generator;

use Aazsamir\Graphpql\Schema\Type;
use Aazsamir\Graphpql\Schema\TypeKind;

trait TypeSkip
{
    private array $skip = [];

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
}
