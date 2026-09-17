<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class ConfigScrapingResultField implements \Aazsamir\Graphpql\Model\ObjectField
{
    private(set) array $fieldVars = [];
    private string $name;
    private \Aazsamir\Graphpql\Model\SelectionSet $child;
    private ?string $union = null;

    /**
     * @return self<mixed>
     */
    public static function scraperUserAgent(): self
    {
        $instance = new self();
        $instance->name = 'scraperUserAgent';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function scraperCDPPath(): self
    {
        $instance = new self();
        $instance->name = 'scraperCDPPath';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function scraperCertCheck(): self
    {
        $instance = new self();
        $instance->name = 'scraperCertCheck';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function excludeTagPatterns(): self
    {
        $instance = new self();
        $instance->name = 'excludeTagPatterns';

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
