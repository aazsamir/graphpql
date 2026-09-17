<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Model;

interface ObjectField
{
    /**
     * @var array<string, mixed>
     */
    public array $fieldVars { get; }

    public function getName(): string;

    public function getChild(): ?\Aazsamir\Graphpql\Model\SelectionSet;

    public function getUnion(): ?string;
}
