<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class ScrapedMovieField implements \Aazsamir\Graphpql\Model\ObjectField
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
    public static function aliases(): self
    {
        $instance = new self();
        $instance->name = 'aliases';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function duration(): self
    {
        $instance = new self();
        $instance->name = 'duration';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function date(): self
    {
        $instance = new self();
        $instance->name = 'date';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function rating(): self
    {
        $instance = new self();
        $instance->name = 'rating';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function director(): self
    {
        $instance = new self();
        $instance->name = 'director';

        return $instance;
    }

    /**
     * @deprecated use urls
     * @return self<mixed>
     */
    public static function url(): self
    {
        $instance = new self();
        $instance->name = 'url';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function urls(): self
    {
        $instance = new self();
        $instance->name = 'urls';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function synopsis(): self
    {
        $instance = new self();
        $instance->name = 'synopsis';

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\ScrapedStudioSelectionSet>
     */
    public static function studio(): self
    {
        $instance = new self();
        $instance->name = 'studio';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\ScrapedStudioSelectionSet();

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\ScrapedTagSelectionSet>
     */
    public static function tags(): self
    {
        $instance = new self();
        $instance->name = 'tags';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\ScrapedTagSelectionSet();

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function front_image(): self
    {
        $instance = new self();
        $instance->name = 'front_image';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function back_image(): self
    {
        $instance = new self();
        $instance->name = 'back_image';

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
