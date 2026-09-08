<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Model;

interface Query
{
    public static function getName(): string;
    public static function getReturnType(): string;
    public function getVars(): array;
    public function getSelectionSet(): SelectionSet;
}
