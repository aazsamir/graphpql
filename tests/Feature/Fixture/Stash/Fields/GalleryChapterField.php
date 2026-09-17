<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class GalleryChapterField implements \Aazsamir\Graphpql\Model\ObjectField
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
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\GallerySelectionSet>
     */
    public static function gallery(): self
    {
        $instance = new self();
        $instance->name = 'gallery';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\GallerySelectionSet();

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
    public static function image_index(): self
    {
        $instance = new self();
        $instance->name = 'image_index';

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
