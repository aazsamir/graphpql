<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class ScrapedPerformerField implements \Aazsamir\Graphpql\Model\ObjectField
{
    private(set) array $fieldVars = [];
    private string $name;
    private \Aazsamir\Graphpql\Model\SelectionSet $child;
    private ?string $union = null;

    /**
     * @return self<mixed>
     */
    public static function stored_id(): self
    {
        $instance = new self();
        $instance->name = 'stored_id';

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
    public static function disambiguation(): self
    {
        $instance = new self();
        $instance->name = 'disambiguation';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function gender(): self
    {
        $instance = new self();
        $instance->name = 'gender';

        return $instance;
    }

    /**
     * @deprecated use urls
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
    public static function urls(): self
    {
        $instance = new self();
        $instance->name = 'urls';

        return $instance;
    }

    /**
     * @deprecated use urls
     * @return self<mixed>
     */
    public static function twitter(): self
    {
        $instance = new self();
        $instance->name = 'twitter';

        return $instance;
    }

    /**
     * @deprecated use urls
     * @return self<mixed>
     */
    public static function instagram(): self
    {
        $instance = new self();
        $instance->name = 'instagram';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function birthdate(): self
    {
        $instance = new self();
        $instance->name = 'birthdate';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function ethnicity(): self
    {
        $instance = new self();
        $instance->name = 'ethnicity';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function country(): self
    {
        $instance = new self();
        $instance->name = 'country';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function eye_color(): self
    {
        $instance = new self();
        $instance->name = 'eye_color';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function height(): self
    {
        $instance = new self();
        $instance->name = 'height';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function measurements(): self
    {
        $instance = new self();
        $instance->name = 'measurements';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function fake_tits(): self
    {
        $instance = new self();
        $instance->name = 'fake_tits';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function penis_length(): self
    {
        $instance = new self();
        $instance->name = 'penis_length';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function circumcised(): self
    {
        $instance = new self();
        $instance->name = 'circumcised';

        return $instance;
    }

    /**
     * @deprecated Use career_start and career_end
     * @return self<mixed>
     */
    public static function career_length(): self
    {
        $instance = new self();
        $instance->name = 'career_length';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function career_start(): self
    {
        $instance = new self();
        $instance->name = 'career_start';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function career_end(): self
    {
        $instance = new self();
        $instance->name = 'career_end';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function tattoos(): self
    {
        $instance = new self();
        $instance->name = 'tattoos';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function piercings(): self
    {
        $instance = new self();
        $instance->name = 'piercings';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function aliases(): self
    {
        $instance = new self();
        $instance->name = 'aliases';

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\ScrapedTagSelectionSet>
     */
    public static function tags(): self
    {
        $instance = new self();
        $instance->name = 'tags';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\ScrapedTagSelectionSet();

        return $instance;
    }

    /**
     * @deprecated use images instead
     * @return self<mixed>
     */
    public static function image(): self
    {
        $instance = new self();
        $instance->name = 'image';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function images(): self
    {
        $instance = new self();
        $instance->name = 'images';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function details(): self
    {
        $instance = new self();
        $instance->name = 'details';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function death_date(): self
    {
        $instance = new self();
        $instance->name = 'death_date';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function hair_color(): self
    {
        $instance = new self();
        $instance->name = 'hair_color';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function weight(): self
    {
        $instance = new self();
        $instance->name = 'weight';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function remote_site_id(): self
    {
        $instance = new self();
        $instance->name = 'remote_site_id';

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
