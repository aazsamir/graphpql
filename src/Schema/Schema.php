<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Schema;

readonly class Schema
{
    /**
     * @param Type[] $types
     * @param Field[] $queries
     * @param Field[] $mutations
     */
    public function __construct(
        public array $types,
        public array $queries,
        public array $mutations,
    ) {}

    public function findType(string $name): Type
    {
        foreach ($this->types as $type) {
            if ($type->name === $name) {
                return $type;
            }
        }

        throw new \Exception("Type {$name} not found");
    }
}
