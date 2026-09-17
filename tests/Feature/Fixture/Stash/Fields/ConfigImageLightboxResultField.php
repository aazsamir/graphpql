<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class ConfigImageLightboxResultField implements \Aazsamir\Graphpql\Model\ObjectField
{
    private(set) array $fieldVars = [];
    private string $name;
    private \Aazsamir\Graphpql\Model\SelectionSet $child;
    private ?string $union = null;

    /**
     * @return self<mixed>
     */
    public static function slideshowDelay(): self
    {
        $instance = new self();
        $instance->name = 'slideshowDelay';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function displayMode(): self
    {
        $instance = new self();
        $instance->name = 'displayMode';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function scaleUp(): self
    {
        $instance = new self();
        $instance->name = 'scaleUp';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function resetZoomOnNav(): self
    {
        $instance = new self();
        $instance->name = 'resetZoomOnNav';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function scrollMode(): self
    {
        $instance = new self();
        $instance->name = 'scrollMode';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function scrollAttemptsBeforeChange(): self
    {
        $instance = new self();
        $instance->name = 'scrollAttemptsBeforeChange';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function disableAnimation(): self
    {
        $instance = new self();
        $instance->name = 'disableAnimation';

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
