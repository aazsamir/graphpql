<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class SceneParserResultField implements \Aazsamir\Graphpql\Model\ObjectField
{
    private(set) array $fieldVars = [];
    private string $name;
    private \Aazsamir\Graphpql\Model\SelectionSet $child;
    private ?string $union = null;

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\SceneSelectionSet>
     */
    public static function scene(): self
    {
        $instance = new self();
        $instance->name = 'scene';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\SceneSelectionSet();

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
    public static function date(): self
    {
        $instance = new self();
        $instance->name = 'date';

        return $instance;
    }

    /**
     * @deprecated Use 1-100 range with rating100
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
    public static function rating100(): self
    {
        $instance = new self();
        $instance->name = 'rating100';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function studio_id(): self
    {
        $instance = new self();
        $instance->name = 'studio_id';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function gallery_ids(): self
    {
        $instance = new self();
        $instance->name = 'gallery_ids';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function performer_ids(): self
    {
        $instance = new self();
        $instance->name = 'performer_ids';

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\SceneMovieIDSelectionSet>
     */
    public static function movies(): self
    {
        $instance = new self();
        $instance->name = 'movies';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\SceneMovieIDSelectionSet();

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function tag_ids(): self
    {
        $instance = new self();
        $instance->name = 'tag_ids';

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
