<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class ScraperSourceField implements \Aazsamir\Graphpql\Model\ObjectField
{
    private(set) array $fieldVars = [];
    private string $name;
    private \Aazsamir\Graphpql\Model\SelectionSet $child;
    private ?string $union = null;

    /**
     * @deprecated use stash_box_endpoint
     * @return self<mixed>
     */
    public static function stash_box_index(): self
    {
        $instance = new self();
        $instance->name = 'stash_box_index';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function stash_box_endpoint(): self
    {
        $instance = new self();
        $instance->name = 'stash_box_endpoint';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function scraper_id(): self
    {
        $instance = new self();
        $instance->name = 'scraper_id';

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
