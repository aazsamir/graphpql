<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ConfigDisableDropdownCreate implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public bool $performer;
    public bool $tag;
    public bool $studio;
    public bool $movie;
    public bool $gallery;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ConfigDisableDropdownCreateField<mixed>
     */
    public static function performer(): Fields\ConfigDisableDropdownCreateField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ConfigDisableDropdownCreateField::performer();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ConfigDisableDropdownCreateField<mixed>
     */
    public static function tag(): Fields\ConfigDisableDropdownCreateField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ConfigDisableDropdownCreateField::tag();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ConfigDisableDropdownCreateField<mixed>
     */
    public static function studio(): Fields\ConfigDisableDropdownCreateField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ConfigDisableDropdownCreateField::studio();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ConfigDisableDropdownCreateField<mixed>
     */
    public static function movie(): Fields\ConfigDisableDropdownCreateField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ConfigDisableDropdownCreateField::movie();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ConfigDisableDropdownCreateField<mixed>
     */
    public static function gallery(): Fields\ConfigDisableDropdownCreateField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ConfigDisableDropdownCreateField::gallery();
    }

    public static function new(bool $performer, bool $tag, bool $studio, bool $movie, bool $gallery): self
    {
        $self = new self();
        $self->performer = $performer;
        $self->tag = $tag;
        $self->studio = $studio;
        $self->movie = $movie;
        $self->gallery = $gallery;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('performer', $data)) {
            $self->performer = $data['performer'];
        }
        if (array_key_exists('tag', $data)) {
            $self->tag = $data['tag'];
        }
        if (array_key_exists('studio', $data)) {
            $self->studio = $data['studio'];
        }
        if (array_key_exists('movie', $data)) {
            $self->movie = $data['movie'];
        }
        if (array_key_exists('gallery', $data)) {
            $self->gallery = $data['gallery'];
        }

        return $self;
    }
}
