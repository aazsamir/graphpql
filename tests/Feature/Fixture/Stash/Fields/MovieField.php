<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class MovieField implements \Aazsamir\Graphpql\Model\ObjectField
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
    public static function rating100(): self
    {
        $instance = new self();
        $instance->name = 'rating100';

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\StudioSelectionSet>
     */
    public static function studio(): self
    {
        $instance = new self();
        $instance->name = 'studio';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\StudioSelectionSet();

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
     * @return self<mixed>
     */
    public static function synopsis(): self
    {
        $instance = new self();
        $instance->name = 'synopsis';

        return $instance;
    }

    /**
     * @deprecated Use urls
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
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\TagSelectionSet>
     */
    public static function tags(): self
    {
        $instance = new self();
        $instance->name = 'tags';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\TagSelectionSet();

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function created_at(): self
    {
        $instance = new self();
        $instance->name = 'created_at';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function updated_at(): self
    {
        $instance = new self();
        $instance->name = 'updated_at';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function front_image_path(): self
    {
        $instance = new self();
        $instance->name = 'front_image_path';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function back_image_path(): self
    {
        $instance = new self();
        $instance->name = 'back_image_path';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function scene_count(?int $depth): self
    {
        $instance = new self();
        $instance->name = 'scene_count';
        $instance->fieldVars['depth'] = $depth;

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\SceneSelectionSet>
     */
    public static function scenes(): self
    {
        $instance = new self();
        $instance->name = 'scenes';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\SceneSelectionSet();

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
