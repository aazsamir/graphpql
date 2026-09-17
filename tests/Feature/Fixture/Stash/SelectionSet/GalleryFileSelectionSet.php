<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\SelectionSet;

class GalleryFileSelectionSet implements \Aazsamir\Graphpql\Model\SelectionSet
{
    private array $selection = [];

    public static function new(): self
    {
        return new self();
    }

    public function select(\Tests\Feature\Fixture\Stash\Fields\GalleryFileField ...$selection): self
    {
        $this->selection = $selection;

        return $this;
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryFileField[]
     */
    public function getSelection(): array
    {
        return $this->selection;
    }
}
