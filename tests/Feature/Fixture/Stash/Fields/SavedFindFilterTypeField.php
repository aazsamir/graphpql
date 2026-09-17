<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class SavedFindFilterTypeField implements \Aazsamir\Graphpql\Model\ObjectField
{
    private(set) array $fieldVars = [];
    private string $name;
    private \Aazsamir\Graphpql\Model\SelectionSet $child;
    private ?string $union = null;

    /**
     * @return self<mixed>
     */
    public static function q(): self
    {
        $instance = new self();
        $instance->name = 'q';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function page(): self
    {
        $instance = new self();
        $instance->name = 'page';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function per_page(): self
    {
        $instance = new self();
        $instance->name = 'per_page';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function sort(): self
    {
        $instance = new self();
        $instance->name = 'sort';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function direction(): self
    {
        $instance = new self();
        $instance->name = 'direction';

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
