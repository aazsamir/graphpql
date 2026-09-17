<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class SceneFileTypeField implements \Aazsamir\Graphpql\Model\ObjectField
{
    private(set) array $fieldVars = [];
    private string $name;
    private \Aazsamir\Graphpql\Model\SelectionSet $child;
    private ?string $union = null;

    /**
     * @return self<mixed>
     */
    public static function size(): self
    {
        $instance = new self();
        $instance->name = 'size';

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
     * @return self<mixed>
     */
    public static function video_codec(): self
    {
        $instance = new self();
        $instance->name = 'video_codec';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function audio_codec(): self
    {
        $instance = new self();
        $instance->name = 'audio_codec';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function width(): self
    {
        $instance = new self();
        $instance->name = 'width';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function height(): self
    {
        $instance = new self();
        $instance->name = 'height';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function framerate(): self
    {
        $instance = new self();
        $instance->name = 'framerate';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function bitrate(): self
    {
        $instance = new self();
        $instance->name = 'bitrate';

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
