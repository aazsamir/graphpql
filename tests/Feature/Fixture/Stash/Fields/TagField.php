<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class TagField implements \Aazsamir\Graphpql\Model\ObjectField
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
    public static function sort_name(): self
    {
        $instance = new self();
        $instance->name = 'sort_name';

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
    public static function aliases(): self
    {
        $instance = new self();
        $instance->name = 'aliases';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function ignore_auto_tag(): self
    {
        $instance = new self();
        $instance->name = 'ignore_auto_tag';

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
    public static function favorite(): self
    {
        $instance = new self();
        $instance->name = 'favorite';

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\StashIDSelectionSet>
     */
    public static function stash_ids(): self
    {
        $instance = new self();
        $instance->name = 'stash_ids';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\StashIDSelectionSet();

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function image_path(): self
    {
        $instance = new self();
        $instance->name = 'image_path';

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
     * @return self<mixed>
     */
    public static function scene_marker_count(?int $depth): self
    {
        $instance = new self();
        $instance->name = 'scene_marker_count';
        $instance->fieldVars['depth'] = $depth;

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function image_count(?int $depth): self
    {
        $instance = new self();
        $instance->name = 'image_count';
        $instance->fieldVars['depth'] = $depth;

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function gallery_count(?int $depth): self
    {
        $instance = new self();
        $instance->name = 'gallery_count';
        $instance->fieldVars['depth'] = $depth;

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function performer_count(?int $depth): self
    {
        $instance = new self();
        $instance->name = 'performer_count';
        $instance->fieldVars['depth'] = $depth;

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function studio_count(?int $depth): self
    {
        $instance = new self();
        $instance->name = 'studio_count';
        $instance->fieldVars['depth'] = $depth;

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function group_count(?int $depth): self
    {
        $instance = new self();
        $instance->name = 'group_count';
        $instance->fieldVars['depth'] = $depth;

        return $instance;
    }

    /**
     * @deprecated use group_count instead
     * @return self<mixed>
     */
    public static function movie_count(?int $depth): self
    {
        $instance = new self();
        $instance->name = 'movie_count';
        $instance->fieldVars['depth'] = $depth;

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\TagSelectionSet>
     */
    public static function parents(): self
    {
        $instance = new self();
        $instance->name = 'parents';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\TagSelectionSet();

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\TagSelectionSet>
     */
    public static function children(): self
    {
        $instance = new self();
        $instance->name = 'children';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\TagSelectionSet();

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function parent_count(): self
    {
        $instance = new self();
        $instance->name = 'parent_count';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function child_count(): self
    {
        $instance = new self();
        $instance->name = 'child_count';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function custom_fields(): self
    {
        $instance = new self();
        $instance->name = 'custom_fields';

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
