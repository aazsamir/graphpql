<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Countries\SelectionSet;

class SubdivisionSelectionSet implements \Aazsamir\Graphpql\Model\SelectionSet
{
    private array $selection = [];

    public static function new(): self
    {
        return new self();
    }

    public function select(\Tests\Feature\Fixture\Countries\Fields\SubdivisionField ...$selection): self
    {
        $this->selection = $selection;

        return $this;
    }

    /**
     * @return \Tests\Feature\Fixture\Countries\Fields\SubdivisionField[]
     */
    public function getSelection(): array
    {
        return $this->selection;
    }
}
