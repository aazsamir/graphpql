<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class JobField implements \Aazsamir\Graphpql\Model\ObjectField
{
    private(set) array $fieldVars = [];
    private string $name;
    private \Aazsamir\Graphpql\Model\SelectionSet $child;
    private ?string $union = null;

    /**
     * @return self<mixed>
     */
    public static function id(): self
    {
        $instance = new self();
        $instance->name = 'id';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function status(): self
    {
        $instance = new self();
        $instance->name = 'status';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function subTasks(): self
    {
        $instance = new self();
        $instance->name = 'subTasks';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function description(): self
    {
        $instance = new self();
        $instance->name = 'description';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function progress(): self
    {
        $instance = new self();
        $instance->name = 'progress';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function startTime(): self
    {
        $instance = new self();
        $instance->name = 'startTime';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function endTime(): self
    {
        $instance = new self();
        $instance->name = 'endTime';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function addTime(): self
    {
        $instance = new self();
        $instance->name = 'addTime';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function error(): self
    {
        $instance = new self();
        $instance->name = 'error';

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
