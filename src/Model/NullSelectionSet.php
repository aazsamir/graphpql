<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Model;

class NullSelectionSet implements SelectionSet
{
    public static function new(): self
    {
        return new self();
    }

    public function getSelection(): array
    {
        return [];
    }
}
