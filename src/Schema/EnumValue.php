<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Schema;

readonly class EnumValue
{
    public function __construct(
        public string $name,
        public ?string $description,
        public bool $isDeprecated,
        public ?string $deprecationReason,
    ) {}
}