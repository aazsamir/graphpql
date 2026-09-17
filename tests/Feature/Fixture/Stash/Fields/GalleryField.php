<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class GalleryField implements \Aazsamir\Graphpql\Model\ObjectField
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
    public static function details(): self
    {
        $instance = new self();
        $instance->name = 'details';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function photographer(): self
    {
        $instance = new self();
        $instance->name = 'photographer';

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
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\GalleryFileSelectionSet>
     */
    public static function files(): self
    {
        $instance = new self();
        $instance->name = 'files';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\GalleryFileSelectionSet();

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\FolderSelectionSet>
     */
    public static function folder(): self
    {
        $instance = new self();
        $instance->name = 'folder';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\FolderSelectionSet();

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\GalleryChapterSelectionSet>
     */
    public static function chapters(): self
    {
        $instance = new self();
        $instance->name = 'chapters';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\GalleryChapterSelectionSet();

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
    public static function image_count(): self
    {
        $instance = new self();
        $instance->name = 'image_count';

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
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\ImageSelectionSet>
     */
    public static function cover(): self
    {
        $instance = new self();
        $instance->name = 'cover';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\ImageSelectionSet();

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\GalleryPathsTypeSelectionSet>
     */
    public static function paths(): self
    {
        $instance = new self();
        $instance->name = 'paths';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\GalleryPathsTypeSelectionSet();

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
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\ImageSelectionSet>
     */
    public static function image(int $index): self
    {
        $instance = new self();
        $instance->name = 'image';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\ImageSelectionSet();
        $instance->fieldVars['index'] = $index;

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
