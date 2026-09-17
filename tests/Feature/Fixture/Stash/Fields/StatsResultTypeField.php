<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class StatsResultTypeField implements \Aazsamir\Graphpql\Model\ObjectField
{
    private(set) array $fieldVars = [];
    private string $name;
    private \Aazsamir\Graphpql\Model\SelectionSet $child;
    private ?string $union = null;

    /**
     * @return self<mixed>
     */
    public static function scene_count(): self
    {
        $instance = new self();
        $instance->name = 'scene_count';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function scenes_size(): self
    {
        $instance = new self();
        $instance->name = 'scenes_size';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function scenes_duration(): self
    {
        $instance = new self();
        $instance->name = 'scenes_duration';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function image_count(): self
    {
        $instance = new self();
        $instance->name = 'image_count';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function images_size(): self
    {
        $instance = new self();
        $instance->name = 'images_size';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function gallery_count(): self
    {
        $instance = new self();
        $instance->name = 'gallery_count';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function performer_count(): self
    {
        $instance = new self();
        $instance->name = 'performer_count';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function studio_count(): self
    {
        $instance = new self();
        $instance->name = 'studio_count';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function group_count(): self
    {
        $instance = new self();
        $instance->name = 'group_count';

        return $instance;
    }

    /**
     * @deprecated use group_count instead
     * @return self<mixed>
     */
    public static function movie_count(): self
    {
        $instance = new self();
        $instance->name = 'movie_count';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function tag_count(): self
    {
        $instance = new self();
        $instance->name = 'tag_count';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function total_o_count(): self
    {
        $instance = new self();
        $instance->name = 'total_o_count';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function total_play_duration(): self
    {
        $instance = new self();
        $instance->name = 'total_play_duration';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function total_play_count(): self
    {
        $instance = new self();
        $instance->name = 'total_play_count';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function scenes_played(): self
    {
        $instance = new self();
        $instance->name = 'scenes_played';

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
