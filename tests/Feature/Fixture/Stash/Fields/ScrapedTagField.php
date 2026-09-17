<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class ScrapedTagField implements \Aazsamir\Graphpql\Model\ObjectField
{
    private(set) array $fieldVars = [];
    private string $name;
    private \Aazsamir\Graphpql\Model\SelectionSet $child;
    private ?string $union = null;

    /**
     * @return self<mixed>
     */
    public static function stored_id(): self
    {
        $instance = new self();
        $instance->name = 'stored_id';

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
     * @return self<mixed>
     */
    public static function description(): self
    {
        $instance = new self();
        $instance->name = 'description';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function alias_list(): self
    {
        $instance = new self();
        $instance->name = 'alias_list';

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\ScrapedTagSelectionSet>
     */
    public static function parent(): self
    {
        $instance = new self();
        $instance->name = 'parent';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\ScrapedTagSelectionSet();

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function remote_site_id(): self
    {
        $instance = new self();
        $instance->name = 'remote_site_id';

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
