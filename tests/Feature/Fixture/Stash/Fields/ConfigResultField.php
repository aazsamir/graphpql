<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class ConfigResultField implements \Aazsamir\Graphpql\Model\ObjectField
{
    private(set) array $fieldVars = [];
    private string $name;
    private \Aazsamir\Graphpql\Model\SelectionSet $child;
    private ?string $union = null;

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\ConfigGeneralResultSelectionSet>
     */
    public static function general(): self
    {
        $instance = new self();
        $instance->name = 'general';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\ConfigGeneralResultSelectionSet();

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\ConfigInterfaceResultSelectionSet>
     */
    public static function interface(): self
    {
        $instance = new self();
        $instance->name = 'interface';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\ConfigInterfaceResultSelectionSet();

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\ConfigDLNAResultSelectionSet>
     */
    public static function dlna(): self
    {
        $instance = new self();
        $instance->name = 'dlna';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\ConfigDLNAResultSelectionSet();

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\ConfigScrapingResultSelectionSet>
     */
    public static function scraping(): self
    {
        $instance = new self();
        $instance->name = 'scraping';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\ConfigScrapingResultSelectionSet();

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\ConfigDefaultSettingsResultSelectionSet>
     */
    public static function defaults(): self
    {
        $instance = new self();
        $instance->name = 'defaults';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\ConfigDefaultSettingsResultSelectionSet();

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function ui(): self
    {
        $instance = new self();
        $instance->name = 'ui';

        return $instance;
    }

    /**
     * @param array<string> $include
     * @return self<mixed>
     */
    public static function plugins(?array $include): self
    {
        $instance = new self();
        $instance->name = 'plugins';
        $instance->fieldVars['include'] = $include;

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
