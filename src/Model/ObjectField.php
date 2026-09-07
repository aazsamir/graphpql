<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Model;

interface ObjectField
{
    public function getName(): string;

    public function getChild(): ?\Aazsamir\Graphpql\Model\SelectionSet;
}
