<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class SavedFilterField implements \Aazsamir\Graphpql\Model\ObjectField
{
    private(set) array $fieldVars = [];
    private string $name;
    private \Aazsamir\Graphpql\Model\SelectionSet $child;
    private ?string $union = null;

    /**
     * @return self<mixed>
     */
    public static function id(): self
    {
        $instance = new self();
        $instance->name = 'id';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function mode(): self
    {
        $instance = new self();
        $instance->name = 'mode';

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
     * @deprecated use find_filter and object_filter instead
     * @return self<mixed>
     */
    public static function filter(): self
    {
        $instance = new self();
        $instance->name = 'filter';

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\SavedFindFilterTypeSelectionSet>
     */
    public static function find_filter(): self
    {
        $instance = new self();
        $instance->name = 'find_filter';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\SavedFindFilterTypeSelectionSet();

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function object_filter(): self
    {
        $instance = new self();
        $instance->name = 'object_filter';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function ui_options(): self
    {
        $instance = new self();
        $instance->name = 'ui_options';

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
