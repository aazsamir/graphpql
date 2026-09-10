<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Model;

class NullSelectionSet implements SelectionSet
{
    public static function new(): never
    {
        throw new \Exception('This field does not have a selection set');
    }

    public function getSelection(): array
    {
        return [];
    }
}