<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Schema;

readonly class InputField
{
    public function __construct(
        public string $name,
        public ?string $description,
        public Type $type,
        public ?string $defaultValue,
    ) {}
}