<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class SceneField implements \Aazsamir\Graphpql\Model\ObjectField
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
    public static function title(): self
    {
        $instance = new self();
        $instance->name = 'title';

        return $instance;
    }

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
     * @return self<mixed>
     */
    public static function details(): self
    {
        $instance = new self();
        $instance->name = 'details';

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
     * @return self<mixed>
     */
    public static function organized(): self
    {
        $instance = new self();
        $instance->name = 'organized';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function o_counter(): self
    {
        $instance = new self();
        $instance->name = 'o_counter';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function interactive(): self
    {
        $instance = new self();
        $instance->name = 'interactive';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function interactive_speed(): self
    {
        $instance = new self();
        $instance->name = 'interactive_speed';

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\VideoCaptionSelectionSet>
     */
    public static function captions(): self
    {
        $instance = new self();
        $instance->name = 'captions';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\VideoCaptionSelectionSet();

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
    public static function last_played_at(): self
    {
        $instance = new self();
        $instance->name = 'last_played_at';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function resume_time(): self
    {
        $instance = new self();
        $instance->name = 'resume_time';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function play_duration(): self
    {
        $instance = new self();
        $instance->name = 'play_duration';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function play_count(): self
    {
        $instance = new self();
        $instance->name = 'play_count';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function play_history(): self
    {
        $instance = new self();
        $instance->name = 'play_history';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function o_history(): self
    {
        $instance = new self();
        $instance->name = 'o_history';

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\VideoFileSelectionSet>
     */
    public static function files(): self
    {
        $instance = new self();
        $instance->name = 'files';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\VideoFileSelectionSet();

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\ScenePathsTypeSelectionSet>
     */
    public static function paths(): self
    {
        $instance = new self();
        $instance->name = 'paths';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\ScenePathsTypeSelectionSet();

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\SceneMarkerSelectionSet>
     */
    public static function scene_markers(): self
    {
        $instance = new self();
        $instance->name = 'scene_markers';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\SceneMarkerSelectionSet();

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\GallerySelectionSet>
     */
    public static function galleries(): self
    {
        $instance = new self();
        $instance->name = 'galleries';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\GallerySelectionSet();

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
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\SceneGroupSelectionSet>
     */
    public static function groups(): self
    {
        $instance = new self();
        $instance->name = 'groups';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\SceneGroupSelectionSet();

        return $instance;
    }

    /**
     * @deprecated Use groups
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\SceneMovieSelectionSet>
     */
    public static function movies(): self
    {
        $instance = new self();
        $instance->name = 'movies';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\SceneMovieSelectionSet();

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
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\PerformerSelectionSet>
     */
    public static function performers(): self
    {
        $instance = new self();
        $instance->name = 'performers';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\PerformerSelectionSet();

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
    public static function custom_fields(): self
    {
        $instance = new self();
        $instance->name = 'custom_fields';

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\SceneStreamEndpointSelectionSet>
     */
    public static function sceneStreams(): self
    {
        $instance = new self();
        $instance->name = 'sceneStreams';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\SceneStreamEndpointSelectionSet();

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
