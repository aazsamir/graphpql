<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Model;

class NullField implements ObjectField
{
    public function getName(): string
    {
        throw new \Exception('Invalid field');
    }

    public function getChild(): ?SelectionSet
    {
        throw new \Exception('Invalid field');
    }

    public function getUnion(): ?string
    {
        throw new \Exception('Invalid field');
    }
}