<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class MovieUpdateInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $id;
    public ?string $name;
    public ?string $aliases;
    public ?int $duration;
    public ?string $date;
    public ?int $rating100;
    public ?string $studio_id;
    public ?string $director;
    public ?string $synopsis;
    public ?string $url;

    /** @var array<string> */
    public ?array $urls;

    /** @var array<string> */
    public ?array $tag_ids;
    public ?string $front_image;
    public ?string $back_image;

    /**
     * @param array<string> $urls
     * @param array<string> $tag_ids
     */
    public static function new(
        string $id,
        ?string $name = null,
        ?string $aliases = null,
        ?int $duration = null,
        ?string $date = null,
        ?int $rating100 = null,
        ?string $studio_id = null,
        ?string $director = null,
        ?string $synopsis = null,
        ?string $url = null,
        ?array $urls = null,
        ?array $tag_ids = null,
        ?string $front_image = null,
        ?string $back_image = null,
    ): self {
        $self = new self();
        $self->id = $id;
        $self->name = $name;
        $self->aliases = $aliases;
        $self->duration = $duration;
        $self->date = $date;
        $self->rating100 = $rating100;
        $self->studio_id = $studio_id;
        $self->director = $director;
        $self->synopsis = $synopsis;
        $self->url = $url;
        $self->urls = $urls;
        $self->tag_ids = $tag_ids;
        $self->front_image = $front_image;
        $self->back_image = $back_image;

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
        if (array_key_exists('studio_id', $data)) {
            $self->studio_id = $data['studio_id'];
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
        if (array_key_exists('urls', $data)) {
            $self->urls = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['urls'] ?? []);
        }
        if (array_key_exists('tag_ids', $data)) {
            $self->tag_ids = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['tag_ids'] ?? []);
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
