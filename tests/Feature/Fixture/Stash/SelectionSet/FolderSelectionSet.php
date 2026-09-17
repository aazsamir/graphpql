<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\SelectionSet;

class FolderSelectionSet implements \Aazsamir\Graphpql\Model\SelectionSet
{
    private array $selection = [];

    public static function new(): self
    {
        return new self();
    }

    public function select(\Tests\Feature\Fixture\Stash\Fields\FolderField ...$selection): self
    {
        $this->selection = $selection;

        return $this;
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\FolderField[]
     */
    public function getSelection(): array
    {
        return $this->selection;
    }
}
