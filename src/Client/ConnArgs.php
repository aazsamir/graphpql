<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Client;

readonly class ConnArgs
{
    public function __construct(
        public string $endpoint,
    ) {}
}
