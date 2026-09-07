<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Schema;

readonly class Field
{
    /**
     * @param InputField[]|null $args
     */
    public function __construct(
        public string $name,
        public ?string $description,
        public ?array $args,
        public Type $type,
        public bool $isDeprecated,
        public ?string $deprecationReason,
    ) {}
}
