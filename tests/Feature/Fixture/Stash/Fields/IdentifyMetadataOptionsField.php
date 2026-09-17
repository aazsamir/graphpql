<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class IdentifyMetadataOptionsField implements \Aazsamir\Graphpql\Model\ObjectField
{
    private(set) array $fieldVars = [];
    private string $name;
    private \Aazsamir\Graphpql\Model\SelectionSet $child;
    private ?string $union = null;

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\IdentifyFieldOptionsSelectionSet>
     */
    public static function fieldOptions(): self
    {
        $instance = new self();
        $instance->name = 'fieldOptions';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\IdentifyFieldOptionsSelectionSet();

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function setCoverImage(): self
    {
        $instance = new self();
        $instance->name = 'setCoverImage';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function setOrganized(): self
    {
        $instance = new self();
        $instance->name = 'setOrganized';

        return $instance;
    }

    /**
     * @deprecated Use performerGenders
     * @return self<mixed>
     */
    public static function includeMalePerformers(): self
    {
        $instance = new self();
        $instance->name = 'includeMalePerformers';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function performerGenders(): self
    {
        $instance = new self();
        $instance->name = 'performerGenders';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function skipMultipleMatches(): self
    {
        $instance = new self();
        $instance->name = 'skipMultipleMatches';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function skipMultipleMatchTag(): self
    {
        $instance = new self();
        $instance->name = 'skipMultipleMatchTag';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function skipSingleNamePerformers(): self
    {
        $instance = new self();
        $instance->name = 'skipSingleNamePerformers';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function skipSingleNamePerformerTag(): self
    {
        $instance = new self();
        $instance->name = 'skipSingleNamePerformerTag';

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
