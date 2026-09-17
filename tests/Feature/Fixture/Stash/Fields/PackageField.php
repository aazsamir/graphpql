<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class PackageField implements \Aazsamir\Graphpql\Model\ObjectField
{
    private(set) array $fieldVars = [];
    private string $name;
    private \Aazsamir\Graphpql\Model\SelectionSet $child;
    private ?string $union = null;

    /**
     * @return self<mixed>
     */
    public static function package_id(): self
    {
        $instance = new self();
        $instance->name = 'package_id';

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
    public static function version(): self
    {
        $instance = new self();
        $instance->name = 'version';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function date(): self
    {
        $instance = new self();
        $instance->name = 'date';

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\PackageSelectionSet>
     */
    public static function requires(): self
    {
        $instance = new self();
        $instance->name = 'requires';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\PackageSelectionSet();

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function sourceURL(): self
    {
        $instance = new self();
        $instance->name = 'sourceURL';

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\PackageSelectionSet>
     */
    public static function source_package(): self
    {
        $instance = new self();
        $instance->name = 'source_package';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\PackageSelectionSet();

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function metadata(): self
    {
        $instance = new self();
        $instance->name = 'metadata';

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
