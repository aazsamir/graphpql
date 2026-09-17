<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class Movie implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $id;
    public string $name;
    public ?string $aliases;
    public ?int $duration;
    public ?string $date;
    public ?int $rating100;
    public ?Studio $studio;
    public ?string $director;
    public ?string $synopsis;
    public ?string $url;

    /** @var array<string> */
    public array $urls;

    /** @var array<\Tests\Feature\Fixture\Stash\Tag> */
    public array $tags;
    public \DateTimeInterface $created_at;
    public \DateTimeInterface $updated_at;
    public ?string $front_image_path;
    public ?string $back_image_path;
    public int $scene_count;

    /** @var array<\Tests\Feature\Fixture\Stash\Scene> */
    public array $scenes;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\MovieField<mixed>
     */
    public static function id(): Fields\MovieField
    {
        return \Tests\Feature\Fixture\Stash\Fields\MovieField::id();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\MovieField<mixed>
     */
    public static function name(): Fields\MovieField
    {
        return \Tests\Feature\Fixture\Stash\Fields\MovieField::name();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\MovieField<mixed>
     */
    public static function aliases(): Fields\MovieField
    {
        return \Tests\Feature\Fixture\Stash\Fields\MovieField::aliases();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\MovieField<mixed>
     */
    public static function duration(): Fields\MovieField
    {
        return \Tests\Feature\Fixture\Stash\Fields\MovieField::duration();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\MovieField<mixed>
     */
    public static function date(): Fields\MovieField
    {
        return \Tests\Feature\Fixture\Stash\Fields\MovieField::date();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\MovieField<mixed>
     */
    public static function rating100(): Fields\MovieField
    {
        return \Tests\Feature\Fixture\Stash\Fields\MovieField::rating100();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\MovieField<\Tests\Feature\Fixture\Stash\SelectionSet\StudioSelectionSet>
     */
    public static function studio(): Fields\MovieField
    {
        return \Tests\Feature\Fixture\Stash\Fields\MovieField::studio();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\MovieField<mixed>
     */
    public static function director(): Fields\MovieField
    {
        return \Tests\Feature\Fixture\Stash\Fields\MovieField::director();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\MovieField<mixed>
     */
    public static function synopsis(): Fields\MovieField
    {
        return \Tests\Feature\Fixture\Stash\Fields\MovieField::synopsis();
    }

    /**
     * @deprecated Use urls
     * @return \Tests\Feature\Fixture\Stash\Fields\MovieField<mixed>
     */
    public static function url(): Fields\MovieField
    {
        return \Tests\Feature\Fixture\Stash\Fields\MovieField::url();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\MovieField<mixed>
     */
    public static function urls(): Fields\MovieField
    {
        return \Tests\Feature\Fixture\Stash\Fields\MovieField::urls();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\MovieField<\Tests\Feature\Fixture\Stash\SelectionSet\TagSelectionSet>
     */
    public static function tags(): Fields\MovieField
    {
        return \Tests\Feature\Fixture\Stash\Fields\MovieField::tags();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\MovieField<mixed>
     */
    public static function created_at(): Fields\MovieField
    {
        return \Tests\Feature\Fixture\Stash\Fields\MovieField::created_at();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\MovieField<mixed>
     */
    public static function updated_at(): Fields\MovieField
    {
        return \Tests\Feature\Fixture\Stash\Fields\MovieField::updated_at();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\MovieField<mixed>
     */
    public static function front_image_path(): Fields\MovieField
    {
        return \Tests\Feature\Fixture\Stash\Fields\MovieField::front_image_path();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\MovieField<mixed>
     */
    public static function back_image_path(): Fields\MovieField
    {
        return \Tests\Feature\Fixture\Stash\Fields\MovieField::back_image_path();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\MovieField<mixed>
     */
    public static function scene_count(?int $depth): Fields\MovieField
    {
        return \Tests\Feature\Fixture\Stash\Fields\MovieField::scene_count($depth,);
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\MovieField<\Tests\Feature\Fixture\Stash\SelectionSet\SceneSelectionSet>
     */
    public static function scenes(): Fields\MovieField
    {
        return \Tests\Feature\Fixture\Stash\Fields\MovieField::scenes();
    }

    /**
     * @param array<string> $urls
     * @param array<\Tests\Feature\Fixture\Stash\Tag> $tags
     * @param array<\Tests\Feature\Fixture\Stash\Scene> $scenes
     */
    public static function new(
        string $id,
        string $name,
        array $urls,
        array $tags,
        \DateTimeInterface $created_at,
        \DateTimeInterface $updated_at,
        int $scene_count,
        array $scenes,
        ?string $aliases = null,
        ?int $duration = null,
        ?string $date = null,
        ?int $rating100 = null,
        ?Studio $studio = null,
        ?string $director = null,
        ?string $synopsis = null,
        ?string $url = null,
        ?string $front_image_path = null,
        ?string $back_image_path = null,
    ): self {
        $self = new self();
        $self->id = $id;
        $self->name = $name;
        $self->urls = $urls;
        $self->tags = $tags;
        $self->created_at = $created_at;
        $self->updated_at = $updated_at;
        $self->scene_count = $scene_count;
        $self->scenes = $scenes;
        $self->aliases = $aliases;
        $self->duration = $duration;
        $self->date = $date;
        $self->rating100 = $rating100;
        $self->studio = $studio;
        $self->director = $director;
        $self->synopsis = $synopsis;
        $self->url = $url;
        $self->front_image_path = $front_image_path;
        $self->back_image_path = $back_image_path;

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
        if (array_key_exists('urls', $data)) {
            $self->urls = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['urls'] ?? []);
        }
        if (array_key_exists('tags', $data)) {
            $self->tags = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\Tag::fromArray($data);
            }, $data['tags'] ?? []);
        }
        if (array_key_exists('created_at', $data)) {
            $self->created_at = new \DateTimeImmutable($data['created_at']);
        }
        if (array_key_exists('updated_at', $data)) {
            $self->updated_at = new \DateTimeImmutable($data['updated_at']);
        }
        if (array_key_exists('scene_count', $data)) {
            $self->scene_count = $data['scene_count'];
        }
        if (array_key_exists('scenes', $data)) {
            $self->scenes = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\Scene::fromArray($data);
            }, $data['scenes'] ?? []);
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
        if (array_key_exists('rating100', $data)) {
            $self->rating100 = $data['rating100'];
        }
        if (array_key_exists('studio', $data)) {
            $self->studio = \Tests\Feature\Fixture\Stash\Studio::fromArray($data['studio']);
        }
        if (array_key_exists('director', $data)) {
            $self->director = $data['director'];
        }
        if (array_key_exists('synopsis', $data)) {
            $self->synopsis = $data['synopsis'];
        }
        if (array_key_exists('url', $data)) {
            $self->url = $data['url'];
        }
        if (array_key_exists('front_image_path', $data)) {
            $self->front_image_path = $data['front_image_path'];
        }
        if (array_key_exists('back_image_path', $data)) {
            $self->back_image_path = $data['back_image_path'];
        }

        return $self;
    }
}
