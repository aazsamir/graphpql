<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class ScrapedContentField implements \Aazsamir\Graphpql\Model\ObjectField
{
    private(set) array $fieldVars = [];
    private string $name;
    private \Aazsamir\Graphpql\Model\SelectionSet $child;
    private ?string $union = null;

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\ScrapedStudioSelectionSet>
     */
    public static function onScrapedStudio(): self
    {
        $instance = new self();
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\ScrapedStudioSelectionSet();
        $instance->union = 'ScrapedStudio';

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\ScrapedTagSelectionSet>
     */
    public static function onScrapedTag(): self
    {
        $instance = new self();
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\ScrapedTagSelectionSet();
        $instance->union = 'ScrapedTag';

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\ScrapedSceneSelectionSet>
     */
    public static function onScrapedScene(): self
    {
        $instance = new self();
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\ScrapedSceneSelectionSet();
        $instance->union = 'ScrapedScene';

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\ScrapedGallerySelectionSet>
     */
    public static function onScrapedGallery(): self
    {
        $instance = new self();
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\ScrapedGallerySelectionSet();
        $instance->union = 'ScrapedGallery';

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\ScrapedImageSelectionSet>
     */
    public static function onScrapedImage(): self
    {
        $instance = new self();
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\ScrapedImageSelectionSet();
        $instance->union = 'ScrapedImage';

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\ScrapedMovieSelectionSet>
     */
    public static function onScrapedMovie(): self
    {
        $instance = new self();
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\ScrapedMovieSelectionSet();
        $instance->union = 'ScrapedMovie';

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\ScrapedGroupSelectionSet>
     */
    public static function onScrapedGroup(): self
    {
        $instance = new self();
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\ScrapedGroupSelectionSet();
        $instance->union = 'ScrapedGroup';

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\ScrapedPerformerSelectionSet>
     */
    public static function onScrapedPerformer(): self
    {
        $instance = new self();
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\ScrapedPerformerSelectionSet();
        $instance->union = 'ScrapedPerformer';

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
