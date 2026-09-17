<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Model;

interface Operation
{
    public static function getName(): string;

    public function getVars(): array;

    public function getSelectionSet(): SelectionSet;
}
