<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class SystemStatusField implements \Aazsamir\Graphpql\Model\ObjectField
{
    private(set) array $fieldVars = [];
    private string $name;
    private \Aazsamir\Graphpql\Model\SelectionSet $child;
    private ?string $union = null;

    /**
     * @return self<mixed>
     */
    public static function databaseSchema(): self
    {
        $instance = new self();
        $instance->name = 'databaseSchema';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function databasePath(): self
    {
        $instance = new self();
        $instance->name = 'databasePath';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function configPath(): self
    {
        $instance = new self();
        $instance->name = 'configPath';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function appSchema(): self
    {
        $instance = new self();
        $instance->name = 'appSchema';

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
    public static function os(): self
    {
        $instance = new self();
        $instance->name = 'os';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function workingDir(): self
    {
        $instance = new self();
        $instance->name = 'workingDir';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function homeDir(): self
    {
        $instance = new self();
        $instance->name = 'homeDir';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function ffmpegPath(): self
    {
        $instance = new self();
        $instance->name = 'ffmpegPath';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function ffprobePath(): self
    {
        $instance = new self();
        $instance->name = 'ffprobePath';

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
