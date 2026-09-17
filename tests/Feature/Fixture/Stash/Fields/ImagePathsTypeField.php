<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class ImagePathsTypeField implements \Aazsamir\Graphpql\Model\ObjectField
{
    private(set) array $fieldVars = [];
    private string $name;
    private \Aazsamir\Graphpql\Model\SelectionSet $child;
    private ?string $union = null;

    /**
     * @return self<mixed>
     */
    public static function thumbnail(): self
    {
        $instance = new self();
        $instance->name = 'thumbnail';

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
    public static function image(): self
    {
        $instance = new self();
        $instance->name = 'image';

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
