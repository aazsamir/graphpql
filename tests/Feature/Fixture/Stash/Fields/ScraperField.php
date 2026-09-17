<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class ScraperField implements \Aazsamir\Graphpql\Model\ObjectField
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
    public static function name(): self
    {
        $instance = new self();
        $instance->name = 'name';

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\ScraperSpecSelectionSet>
     */
    public static function performer(): self
    {
        $instance = new self();
        $instance->name = 'performer';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\ScraperSpecSelectionSet();

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\ScraperSpecSelectionSet>
     */
    public static function scene(): self
    {
        $instance = new self();
        $instance->name = 'scene';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\ScraperSpecSelectionSet();

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\ScraperSpecSelectionSet>
     */
    public static function gallery(): self
    {
        $instance = new self();
        $instance->name = 'gallery';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\ScraperSpecSelectionSet();

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\ScraperSpecSelectionSet>
     */
    public static function image(): self
    {
        $instance = new self();
        $instance->name = 'image';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\ScraperSpecSelectionSet();

        return $instance;
    }

    /**
     * @deprecated use group
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\ScraperSpecSelectionSet>
     */
    public static function movie(): self
    {
        $instance = new self();
        $instance->name = 'movie';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\ScraperSpecSelectionSet();

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\ScraperSpecSelectionSet>
     */
    public static function group(): self
    {
        $instance = new self();
        $instance->name = 'group';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\ScraperSpecSelectionSet();

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
