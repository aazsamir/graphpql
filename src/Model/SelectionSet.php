<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Model;

interface SelectionSet
{
    /**
     * @return ObjectField[]
     */
    public function getSelection(): array;
}
