<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Model;

use Aazsamir\Graphpql\GraphqlException;

class NullField implements ObjectField
{
    public private(set) array $fieldVars = [];

    public function getName(): string
    {
        throw new GraphqlException('Invalid field');
    }

    public function getChild(): ?SelectionSet
    {
        throw new GraphqlException('Invalid field');
    }

    public function getUnion(): ?string
    {
        throw new GraphqlException('Invalid field');
    }
}
