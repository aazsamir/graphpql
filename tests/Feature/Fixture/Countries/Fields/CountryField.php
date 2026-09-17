<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Countries\Fields;

/**
 * @template T
 */
class CountryField implements \Aazsamir\Graphpql\Model\ObjectField
{
    private(set) array $fieldVars = [];
    private string $name;
    private \Aazsamir\Graphpql\Model\SelectionSet $child;
    private ?string $union = null;

    /**
     * @return self<mixed>
     */
    public static function awsRegion(): self
    {
        $instance = new self();
        $instance->name = 'awsRegion';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function capital(): self
    {
        $instance = new self();
        $instance->name = 'capital';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function code(): self
    {
        $instance = new self();
        $instance->name = 'code';

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Countries\SelectionSet\ContinentSelectionSet>
     */
    public static function continent(): self
    {
        $instance = new self();
        $instance->name = 'continent';
        $instance->child = new \Tests\Feature\Fixture\Countries\SelectionSet\ContinentSelectionSet();

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function currencies(): self
    {
        $instance = new self();
        $instance->name = 'currencies';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function currency(): self
    {
        $instance = new self();
        $instance->name = 'currency';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function emoji(): self
    {
        $instance = new self();
        $instance->name = 'emoji';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function emojiU(): self
    {
        $instance = new self();
        $instance->name = 'emojiU';

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Countries\SelectionSet\LanguageSelectionSet>
     */
    public static function languages(): self
    {
        $instance = new self();
        $instance->name = 'languages';
        $instance->child = new \Tests\Feature\Fixture\Countries\SelectionSet\LanguageSelectionSet();

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function name(?string $lang): self
    {
        $instance = new self();
        $instance->name = 'name';
        $instance->fieldVars['lang'] = $lang;

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function native(): self
    {
        $instance = new self();
        $instance->name = 'native';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function phone(): self
    {
        $instance = new self();
        $instance->name = 'phone';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function phones(): self
    {
        $instance = new self();
        $instance->name = 'phones';

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Countries\SelectionSet\StateSelectionSet>
     */
    public static function states(): self
    {
        $instance = new self();
        $instance->name = 'states';
        $instance->child = new \Tests\Feature\Fixture\Countries\SelectionSet\StateSelectionSet();

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Countries\SelectionSet\SubdivisionSelectionSet>
     */
    public static function subdivisions(): self
    {
        $instance = new self();
        $instance->name = 'subdivisions';
        $instance->child = new \Tests\Feature\Fixture\Countries\SelectionSet\SubdivisionSelectionSet();

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
