<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class ImageFileTypeField implements \Aazsamir\Graphpql\Model\ObjectField
{
    private(set) array $fieldVars = [];
    private string $name;
    private \Aazsamir\Graphpql\Model\SelectionSet $child;
    private ?string $union = null;

    /**
     * @return self<mixed>
     */
    public static function mod_time(): self
    {
        $instance = new self();
        $instance->name = 'mod_time';

        return $instance;
    }

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
