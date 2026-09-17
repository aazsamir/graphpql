<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class Scraper implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $id;
    public string $name;
    public ?ScraperSpec $performer;
    public ?ScraperSpec $scene;
    public ?ScraperSpec $gallery;
    public ?ScraperSpec $image;
    public ?ScraperSpec $movie;
    public ?ScraperSpec $group;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScraperField<mixed>
     */
    public static function id(): Fields\ScraperField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScraperField::id();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScraperField<mixed>
     */
    public static function name(): Fields\ScraperField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScraperField::name();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScraperField<\Tests\Feature\Fixture\Stash\SelectionSet\ScraperSpecSelectionSet>
     */
    public static function performer(): Fields\ScraperField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScraperField::performer();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScraperField<\Tests\Feature\Fixture\Stash\SelectionSet\ScraperSpecSelectionSet>
     */
    public static function scene(): Fields\ScraperField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScraperField::scene();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScraperField<\Tests\Feature\Fixture\Stash\SelectionSet\ScraperSpecSelectionSet>
     */
    public static function gallery(): Fields\ScraperField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScraperField::gallery();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScraperField<\Tests\Feature\Fixture\Stash\SelectionSet\ScraperSpecSelectionSet>
     */
    public static function image(): Fields\ScraperField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScraperField::image();
    }

    /**
     * @deprecated use group
     * @return \Tests\Feature\Fixture\Stash\Fields\ScraperField<\Tests\Feature\Fixture\Stash\SelectionSet\ScraperSpecSelectionSet>
     */
    public static function movie(): Fields\ScraperField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScraperField::movie();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScraperField<\Tests\Feature\Fixture\Stash\SelectionSet\ScraperSpecSelectionSet>
     */
    public static function group(): Fields\ScraperField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScraperField::group();
    }

    public static function new(
        string $id,
        string $name,
        ?ScraperSpec $performer = null,
        ?ScraperSpec $scene = null,
        ?ScraperSpec $gallery = null,
        ?ScraperSpec $image = null,
        ?ScraperSpec $movie = null,
        ?ScraperSpec $group = null,
    ): self {
        $self = new self();
        $self->id = $id;
        $self->name = $name;
        $self->performer = $performer;
        $self->scene = $scene;
        $self->gallery = $gallery;
        $self->image = $image;
        $self->movie = $movie;
        $self->group = $group;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('id', $data)) {
            $self->id = $data['id'];
        }
        if (array_key_exists('name', $data)) {
            $self->name = $data['name'];
        }
        if (array_key_exists('performer', $data)) {
            $self->performer = \Tests\Feature\Fixture\Stash\ScraperSpec::fromArray($data['performer']);
        }
        if (array_key_exists('scene', $data)) {
            $self->scene = \Tests\Feature\Fixture\Stash\ScraperSpec::fromArray($data['scene']);
        }
        if (array_key_exists('gallery', $data)) {
            $self->gallery = \Tests\Feature\Fixture\Stash\ScraperSpec::fromArray($data['gallery']);
        }
        if (array_key_exists('image', $data)) {
            $self->image = \Tests\Feature\Fixture\Stash\ScraperSpec::fromArray($data['image']);
        }
        if (array_key_exists('movie', $data)) {
            $self->movie = \Tests\Feature\Fixture\Stash\ScraperSpec::fromArray($data['movie']);
        }
        if (array_key_exists('group', $data)) {
            $self->group = \Tests\Feature\Fixture\Stash\ScraperSpec::fromArray($data['group']);
        }

        return $self;
    }
}
