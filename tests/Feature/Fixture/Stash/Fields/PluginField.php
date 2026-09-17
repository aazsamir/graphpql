<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class PluginField implements \Aazsamir\Graphpql\Model\ObjectField
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
    public static function name(): self
    {
        $instance = new self();
        $instance->name = 'name';

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
    public static function url(): self
    {
        $instance = new self();
        $instance->name = 'url';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function version(): self
    {
        $instance = new self();
        $instance->name = 'version';

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
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\PluginTaskSelectionSet>
     */
    public static function tasks(): self
    {
        $instance = new self();
        $instance->name = 'tasks';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\PluginTaskSelectionSet();

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\PluginHookSelectionSet>
     */
    public static function hooks(): self
    {
        $instance = new self();
        $instance->name = 'hooks';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\PluginHookSelectionSet();

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\PluginSettingSelectionSet>
     */
    public static function settings(): self
    {
        $instance = new self();
        $instance->name = 'settings';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\PluginSettingSelectionSet();

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function requires(): self
    {
        $instance = new self();
        $instance->name = 'requires';

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\PluginPathsSelectionSet>
     */
    public static function paths(): self
    {
        $instance = new self();
        $instance->name = 'paths';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\PluginPathsSelectionSet();

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
