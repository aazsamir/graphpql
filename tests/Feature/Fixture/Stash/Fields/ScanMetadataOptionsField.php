<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class ScanMetadataOptionsField implements \Aazsamir\Graphpql\Model\ObjectField
{
    private(set) array $fieldVars = [];
    private string $name;
    private \Aazsamir\Graphpql\Model\SelectionSet $child;
    private ?string $union = null;

    /**
     * @return self<mixed>
     */
    public static function rescan(): self
    {
        $instance = new self();
        $instance->name = 'rescan';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function scanGenerateCovers(): self
    {
        $instance = new self();
        $instance->name = 'scanGenerateCovers';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function scanGeneratePreviews(): self
    {
        $instance = new self();
        $instance->name = 'scanGeneratePreviews';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function scanGenerateImagePreviews(): self
    {
        $instance = new self();
        $instance->name = 'scanGenerateImagePreviews';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function scanGenerateSprites(): self
    {
        $instance = new self();
        $instance->name = 'scanGenerateSprites';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function scanGeneratePhashes(): self
    {
        $instance = new self();
        $instance->name = 'scanGeneratePhashes';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function scanGenerateImagePhashes(): self
    {
        $instance = new self();
        $instance->name = 'scanGenerateImagePhashes';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function scanGenerateThumbnails(): self
    {
        $instance = new self();
        $instance->name = 'scanGenerateThumbnails';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function scanGenerateClipPreviews(): self
    {
        $instance = new self();
        $instance->name = 'scanGenerateClipPreviews';

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
