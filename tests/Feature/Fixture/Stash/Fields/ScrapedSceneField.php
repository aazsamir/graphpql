<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class ScrapedSceneField implements \Aazsamir\Graphpql\Model\ObjectField
{
    private(set) array $fieldVars = [];
    private string $name;
    private \Aazsamir\Graphpql\Model\SelectionSet $child;
    private ?string $union = null;

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
    public static function date(): self
    {
        $instance = new self();
        $instance->name = 'date';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function image(): self
    {
        $instance = new self();
        $instance->name = 'image';

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\SceneFileTypeSelectionSet>
     */
    public static function file(): self
    {
        $instance = new self();
        $instance->name = 'file';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\SceneFileTypeSelectionSet();

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
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\ScrapedPerformerSelectionSet>
     */
    public static function performers(): self
    {
        $instance = new self();
        $instance->name = 'performers';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\ScrapedPerformerSelectionSet();

        return $instance;
    }

    /**
     * @deprecated use groups
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\ScrapedMovieSelectionSet>
     */
    public static function movies(): self
    {
        $instance = new self();
        $instance->name = 'movies';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\ScrapedMovieSelectionSet();

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\ScrapedGroupSelectionSet>
     */
    public static function groups(): self
    {
        $instance = new self();
        $instance->name = 'groups';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\ScrapedGroupSelectionSet();

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
     * @return self<mixed>
     */
    public static function duration(): self
    {
        $instance = new self();
        $instance->name = 'duration';

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\StashBoxFingerprintSelectionSet>
     */
    public static function fingerprints(): self
    {
        $instance = new self();
        $instance->name = 'fingerprints';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\StashBoxFingerprintSelectionSet();

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
