<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class ConfigDLNAResultField implements \Aazsamir\Graphpql\Model\ObjectField
{
    private(set) array $fieldVars = [];
    private string $name;
    private \Aazsamir\Graphpql\Model\SelectionSet $child;
    private ?string $union = null;

    /**
     * @return self<mixed>
     */
    public static function serverName(): self
    {
        $instance = new self();
        $instance->name = 'serverName';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function enabled(): self
    {
        $instance = new self();
        $instance->name = 'enabled';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function port(): self
    {
        $instance = new self();
        $instance->name = 'port';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function whitelistedIPs(): self
    {
        $instance = new self();
        $instance->name = 'whitelistedIPs';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function interfaces(): self
    {
        $instance = new self();
        $instance->name = 'interfaces';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function videoSortOrder(): self
    {
        $instance = new self();
        $instance->name = 'videoSortOrder';

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
