<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Client;

readonly class Response
{
    public function __construct(
        public mixed $data,
        public array $errors = [],
    ) {}
}
