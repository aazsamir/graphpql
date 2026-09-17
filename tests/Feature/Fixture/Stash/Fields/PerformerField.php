<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class PerformerField implements \Aazsamir\Graphpql\Model\ObjectField
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
    public static function disambiguation(): self
    {
        $instance = new self();
        $instance->name = 'disambiguation';

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
    public static function gender(): self
    {
        $instance = new self();
        $instance->name = 'gender';

        return $instance;
    }

    /**
     * @deprecated Use urls
     * @return self<mixed>
     */
    public static function twitter(): self
    {
        $instance = new self();
        $instance->name = 'twitter';

        return $instance;
    }

    /**
     * @deprecated Use urls
     * @return self<mixed>
     */
    public static function instagram(): self
    {
        $instance = new self();
        $instance->name = 'instagram';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function birthdate(): self
    {
        $instance = new self();
        $instance->name = 'birthdate';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function ethnicity(): self
    {
        $instance = new self();
        $instance->name = 'ethnicity';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function country(): self
    {
        $instance = new self();
        $instance->name = 'country';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function eye_color(): self
    {
        $instance = new self();
        $instance->name = 'eye_color';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function height_cm(): self
    {
        $instance = new self();
        $instance->name = 'height_cm';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function measurements(): self
    {
        $instance = new self();
        $instance->name = 'measurements';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function fake_tits(): self
    {
        $instance = new self();
        $instance->name = 'fake_tits';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function penis_length(): self
    {
        $instance = new self();
        $instance->name = 'penis_length';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function circumcised(): self
    {
        $instance = new self();
        $instance->name = 'circumcised';

        return $instance;
    }

    /**
     * @deprecated Use career_start and career_end
     * @return self<mixed>
     */
    public static function career_length(): self
    {
        $instance = new self();
        $instance->name = 'career_length';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function career_start(): self
    {
        $instance = new self();
        $instance->name = 'career_start';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function career_end(): self
    {
        $instance = new self();
        $instance->name = 'career_end';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function tattoos(): self
    {
        $instance = new self();
        $instance->name = 'tattoos';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function piercings(): self
    {
        $instance = new self();
        $instance->name = 'piercings';

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
     * @return self<mixed>
     */
    public static function favorite(): self
    {
        $instance = new self();
        $instance->name = 'favorite';

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
    public static function ignore_auto_tag(): self
    {
        $instance = new self();
        $instance->name = 'ignore_auto_tag';

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
    public static function scene_count(): self
    {
        $instance = new self();
        $instance->name = 'scene_count';

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
    public static function gallery_count(): self
    {
        $instance = new self();
        $instance->name = 'gallery_count';

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
    public static function performer_count(): self
    {
        $instance = new self();
        $instance->name = 'performer_count';

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
    public static function rating100(): self
    {
        $instance = new self();
        $instance->name = 'rating100';

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
    public static function death_date(): self
    {
        $instance = new self();
        $instance->name = 'death_date';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function hair_color(): self
    {
        $instance = new self();
        $instance->name = 'hair_color';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function weight(): self
    {
        $instance = new self();
        $instance->name = 'weight';

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
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\GroupSelectionSet>
     */
    public static function groups(): self
    {
        $instance = new self();
        $instance->name = 'groups';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\GroupSelectionSet();

        return $instance;
    }

    /**
     * @deprecated use groups instead
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\MovieSelectionSet>
     */
    public static function movies(): self
    {
        $instance = new self();
        $instance->name = 'movies';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\MovieSelectionSet();

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
