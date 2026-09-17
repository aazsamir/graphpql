<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class DLNAStatusField implements \Aazsamir\Graphpql\Model\ObjectField
{
    private(set) array $fieldVars = [];
    private string $name;
    private \Aazsamir\Graphpql\Model\SelectionSet $child;
    private ?string $union = null;

    /**
     * @return self<mixed>
     */
    public static function running(): self
    {
        $instance = new self();
        $instance->name = 'running';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function until(): self
    {
        $instance = new self();
        $instance->name = 'until';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function recentIPAddresses(): self
    {
        $instance = new self();
        $instance->name = 'recentIPAddresses';

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\DLNAIPSelectionSet>
     */
    public static function allowedIPAddresses(): self
    {
        $instance = new self();
        $instance->name = 'allowedIPAddresses';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\DLNAIPSelectionSet();

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
