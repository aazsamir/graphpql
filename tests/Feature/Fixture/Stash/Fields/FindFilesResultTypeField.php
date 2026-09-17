<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class FindFilesResultTypeField implements \Aazsamir\Graphpql\Model\ObjectField
{
    private(set) array $fieldVars = [];
    private string $name;
    private \Aazsamir\Graphpql\Model\SelectionSet $child;
    private ?string $union = null;

    /**
     * @return self<mixed>
     */
    public static function count(): self
    {
        $instance = new self();
        $instance->name = 'count';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function megapixels(): self
    {
        $instance = new self();
        $instance->name = 'megapixels';

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
    public static function size(): self
    {
        $instance = new self();
        $instance->name = 'size';

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\BaseFileSelectionSet>
     */
    public static function files(): self
    {
        $instance = new self();
        $instance->name = 'files';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\BaseFileSelectionSet();

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
