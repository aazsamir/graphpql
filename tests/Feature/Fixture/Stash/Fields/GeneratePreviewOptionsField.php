<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class GeneratePreviewOptionsField implements \Aazsamir\Graphpql\Model\ObjectField
{
    private(set) array $fieldVars = [];
    private string $name;
    private \Aazsamir\Graphpql\Model\SelectionSet $child;
    private ?string $union = null;

    /**
     * @return self<mixed>
     */
    public static function previewSegments(): self
    {
        $instance = new self();
        $instance->name = 'previewSegments';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function previewSegmentDuration(): self
    {
        $instance = new self();
        $instance->name = 'previewSegmentDuration';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function previewExcludeStart(): self
    {
        $instance = new self();
        $instance->name = 'previewExcludeStart';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function previewExcludeEnd(): self
    {
        $instance = new self();
        $instance->name = 'previewExcludeEnd';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function previewPreset(): self
    {
        $instance = new self();
        $instance->name = 'previewPreset';

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
