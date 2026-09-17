<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Model;

use Aazsamir\Graphpql\Client\Response;

interface Operation
{
    public static function getName(): string;

    /**
     * @return array<string, mixed>
     */
    public function getVars(): array;

    public function getSelectionSet(): SelectionSet;

    public function serializeResponse(Response $response): mixed;
}
