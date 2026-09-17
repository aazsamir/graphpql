<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Countries\Fields;

/**
 * @template T
 */
class ContinentField implements \Aazsamir\Graphpql\Model\ObjectField
{
    private(set) array $fieldVars = [];
    private string $name;
    private \Aazsamir\Graphpql\Model\SelectionSet $child;
    private ?string $union = null;

    /**
     * @return self<mixed>
     */
    public static function code(): self
    {
        $instance = new self();
        $instance->name = 'code';

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Countries\SelectionSet\CountrySelectionSet>
     */
    public static function countries(): self
    {
        $instance = new self();
        $instance->name = 'countries';
        $instance->child = new \Tests\Feature\Fixture\Countries\SelectionSet\CountrySelectionSet();

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function name(): self
    {
        $instance = new self();
        $instance->name = 'name';

        return $instance;
    }

    /**
     * @param callable(T): void $selection
     */
    public function selector(callable $selection): self
    {
        $selection($this->child);

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getChild(): ?\Aazsamir\Graphpql\Model\SelectionSet
    {
        if (isset($this->child)) {
            return $this->child;
        }

        return null;
    }

    public function getUnion(): ?string
    {
        return $this->union;
    }
}
