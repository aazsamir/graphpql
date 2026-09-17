<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class ScenePathsTypeField implements \Aazsamir\Graphpql\Model\ObjectField
{
    private(set) array $fieldVars = [];
    private string $name;
    private \Aazsamir\Graphpql\Model\SelectionSet $child;
    private ?string $union = null;

    /**
     * @return self<mixed>
     */
    public static function screenshot(): self
    {
        $instance = new self();
        $instance->name = 'screenshot';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function preview(): self
    {
        $instance = new self();
        $instance->name = 'preview';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function stream(): self
    {
        $instance = new self();
        $instance->name = 'stream';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function webp(): self
    {
        $instance = new self();
        $instance->name = 'webp';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function vtt(): self
    {
        $instance = new self();
        $instance->name = 'vtt';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function sprite(): self
    {
        $instance = new self();
        $instance->name = 'sprite';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function funscript(): self
    {
        $instance = new self();
        $instance->name = 'funscript';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function interactive_heatmap(): self
    {
        $instance = new self();
        $instance->name = 'interactive_heatmap';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function caption(): self
    {
        $instance = new self();
        $instance->name = 'caption';

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
