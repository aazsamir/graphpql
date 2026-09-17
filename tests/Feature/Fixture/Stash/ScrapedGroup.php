<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ScrapedGroup implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?string $stored_id;
    public ?string $name;
    public ?string $aliases;
    public ?string $duration;
    public ?string $date;
    public ?string $rating;
    public ?string $director;

    /** @var array<string> */
    public ?array $urls;
    public ?string $synopsis;
    public ?ScrapedStudio $studio;

    /** @var array<\Tests\Feature\Fixture\Stash\ScrapedTag> */
    public ?array $tags;
    public ?string $front_image;
    public ?string $back_image;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedGroupField<mixed>
     */
    public static function stored_id(): Fields\ScrapedGroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedGroupField::stored_id();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedGroupField<mixed>
     */
    public static function name(): Fields\ScrapedGroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedGroupField::name();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedGroupField<mixed>
     */
    public static function aliases(): Fields\ScrapedGroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedGroupField::aliases();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedGroupField<mixed>
     */
    public static function duration(): Fields\ScrapedGroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedGroupField::duration();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedGroupField<mixed>
     */
    public static function date(): Fields\ScrapedGroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedGroupField::date();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedGroupField<mixed>
     */
    public static function rating(): Fields\ScrapedGroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedGroupField::rating();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedGroupField<mixed>
     */
    public static function director(): Fields\ScrapedGroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedGroupField::director();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedGroupField<mixed>
     */
    public static function urls(): Fields\ScrapedGroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedGroupField::urls();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedGroupField<mixed>
     */
    public static function synopsis(): Fields\ScrapedGroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedGroupField::synopsis();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedGroupField<\Tests\Feature\Fixture\Stash\SelectionSet\ScrapedStudioSelectionSet>
     */
    public static function studio(): Fields\ScrapedGroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedGroupField::studio();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedGroupField<\Tests\Feature\Fixture\Stash\SelectionSet\ScrapedTagSelectionSet>
     */
    public static function tags(): Fields\ScrapedGroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedGroupField::tags();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedGroupField<mixed>
     */
    public static function front_image(): Fields\ScrapedGroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedGroupField::front_image();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedGroupField<mixed>
     */
    public static function back_image(): Fields\ScrapedGroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedGroupField::back_image();
    }

    /**
     * @param array<string> $urls
     * @param array<\Tests\Feature\Fixture\Stash\ScrapedTag> $tags
     */
    public static function new(
        ?string $stored_id = null,
        ?string $name = null,
        ?string $aliases = null,
        ?string $duration = null,
        ?string $date = null,
        ?string $rating = null,
        ?string $director = null,
        ?array $urls = null,
        ?string $synopsis = null,
        ?ScrapedStudio $studio = null,
        ?array $tags = null,
        ?string $front_image = null,
        ?string $back_image = null,
    ): self {
        $self = new self();
        $self->stored_id = $stored_id;
        $self->name = $name;
        $self->aliases = $aliases;
        $self->duration = $duration;
        $self->date = $date;
        $self->rating = $rating;
        $self->director = $director;
        $self->urls = $urls;
        $self->synopsis = $synopsis;
        $self->studio = $studio;
        $self->tags = $tags;
        $self->front_image = $front_image;
        $self->back_image = $back_image;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('stored_id', $data)) {
            $self->stored_id = $data['stored_id'];
        }
        if (array_key_exists('name', $data)) {
            $self->name = $data['name'];
        }
        if (array_key_exists('aliases', $data)) {
            $self->aliases = $data['aliases'];
        }
        if (array_key_exists('duration', $data)) {
            $self->duration = $data['duration'];
        }
        if (array_key_exists('date', $data)) {
            $self->date = $data['date'];
        }
        if (array_key_exists('rating', $data)) {
            $self->rating = $data['rating'];
        }
        if (array_key_exists('director', $data)) {
            $self->director = $data['director'];
        }
        if (array_key_exists('urls', $data)) {
            $self->urls = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['urls'] ?? []);
        }
        if (array_key_exists('synopsis', $data)) {
            $self->synopsis = $data['synopsis'];
        }
        if (array_key_exists('studio', $data)) {
            $self->studio = \Tests\Feature\Fixture\Stash\ScrapedStudio::fromArray($data['studio']);
        }
        if (array_key_exists('tags', $data)) {
            $self->tags = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\ScrapedTag::fromArray($data);
            }, $data['tags'] ?? []);
        }
        if (array_key_exists('front_image', $data)) {
            $self->front_image = $data['front_image'];
        }
        if (array_key_exists('back_image', $data)) {
            $self->back_image = $data['back_image'];
        }

        return $self;
    }
}
