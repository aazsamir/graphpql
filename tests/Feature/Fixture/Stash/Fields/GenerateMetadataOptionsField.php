<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class GenerateMetadataOptionsField implements \Aazsamir\Graphpql\Model\ObjectField
{
    private(set) array $fieldVars = [];
    private string $name;
    private \Aazsamir\Graphpql\Model\SelectionSet $child;
    private ?string $union = null;

    /**
     * @return self<mixed>
     */
    public static function covers(): self
    {
        $instance = new self();
        $instance->name = 'covers';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function sprites(): self
    {
        $instance = new self();
        $instance->name = 'sprites';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function previews(): self
    {
        $instance = new self();
        $instance->name = 'previews';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function imagePreviews(): self
    {
        $instance = new self();
        $instance->name = 'imagePreviews';

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\GeneratePreviewOptionsSelectionSet>
     */
    public static function previewOptions(): self
    {
        $instance = new self();
        $instance->name = 'previewOptions';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\GeneratePreviewOptionsSelectionSet();

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function markers(): self
    {
        $instance = new self();
        $instance->name = 'markers';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function markerImagePreviews(): self
    {
        $instance = new self();
        $instance->name = 'markerImagePreviews';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function markerScreenshots(): self
    {
        $instance = new self();
        $instance->name = 'markerScreenshots';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function transcodes(): self
    {
        $instance = new self();
        $instance->name = 'transcodes';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function phashes(): self
    {
        $instance = new self();
        $instance->name = 'phashes';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function interactiveHeatmapsSpeeds(): self
    {
        $instance = new self();
        $instance->name = 'interactiveHeatmapsSpeeds';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function imageThumbnails(): self
    {
        $instance = new self();
        $instance->name = 'imageThumbnails';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function clipPreviews(): self
    {
        $instance = new self();
        $instance->name = 'clipPreviews';

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
