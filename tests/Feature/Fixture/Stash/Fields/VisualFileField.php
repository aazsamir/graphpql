<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class VisualFileField implements \Aazsamir\Graphpql\Model\ObjectField
{
    private(set) array $fieldVars = [];
    private string $name;
    private \Aazsamir\Graphpql\Model\SelectionSet $child;
    private ?string $union = null;

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\VideoFileSelectionSet>
     */
    public static function onVideoFile(): self
    {
        $instance = new self();
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\VideoFileSelectionSet();
        $instance->union = 'VideoFile';

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\ImageFileSelectionSet>
     */
    public static function onImageFile(): self
    {
        $instance = new self();
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\ImageFileSelectionSet();
        $instance->union = 'ImageFile';

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
