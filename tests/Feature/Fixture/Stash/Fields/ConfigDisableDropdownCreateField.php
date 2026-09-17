<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class ConfigDisableDropdownCreateField implements \Aazsamir\Graphpql\Model\ObjectField
{
    private(set) array $fieldVars = [];
    private string $name;
    private \Aazsamir\Graphpql\Model\SelectionSet $child;
    private ?string $union = null;

    /**
     * @return self<mixed>
     */
    public static function performer(): self
    {
        $instance = new self();
        $instance->name = 'performer';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function tag(): self
    {
        $instance = new self();
        $instance->name = 'tag';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function studio(): self
    {
        $instance = new self();
        $instance->name = 'studio';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function movie(): self
    {
        $instance = new self();
        $instance->name = 'movie';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function gallery(): self
    {
        $instance = new self();
        $instance->name = 'gallery';

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
