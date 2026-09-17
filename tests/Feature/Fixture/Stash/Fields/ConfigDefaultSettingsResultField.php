<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class ConfigDefaultSettingsResultField implements \Aazsamir\Graphpql\Model\ObjectField
{
    private(set) array $fieldVars = [];
    private string $name;
    private \Aazsamir\Graphpql\Model\SelectionSet $child;
    private ?string $union = null;

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\ScanMetadataOptionsSelectionSet>
     */
    public static function scan(): self
    {
        $instance = new self();
        $instance->name = 'scan';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\ScanMetadataOptionsSelectionSet();

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\IdentifyMetadataTaskOptionsSelectionSet>
     */
    public static function identify(): self
    {
        $instance = new self();
        $instance->name = 'identify';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\IdentifyMetadataTaskOptionsSelectionSet();

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\AutoTagMetadataOptionsSelectionSet>
     */
    public static function autoTag(): self
    {
        $instance = new self();
        $instance->name = 'autoTag';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\AutoTagMetadataOptionsSelectionSet();

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\GenerateMetadataOptionsSelectionSet>
     */
    public static function generate(): self
    {
        $instance = new self();
        $instance->name = 'generate';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\GenerateMetadataOptionsSelectionSet();

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function deleteFile(): self
    {
        $instance = new self();
        $instance->name = 'deleteFile';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function deleteGenerated(): self
    {
        $instance = new self();
        $instance->name = 'deleteGenerated';

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
