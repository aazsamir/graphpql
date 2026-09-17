<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class SceneCreateInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?string $title;
    public ?string $code;
    public ?string $details;
    public ?string $director;
    public ?string $url;

    /** @var array<string> */
    public ?array $urls;
    public ?string $date;
    public ?int $rating100;
    public ?bool $organized;
    public ?string $studio_id;

    /** @var array<string> */
    public ?array $gallery_ids;

    /** @var array<string> */
    public ?array $performer_ids;

    /** @var array<\Tests\Feature\Fixture\Stash\SceneGroupInput> */
    public ?array $groups;

    /** @var array<\Tests\Feature\Fixture\Stash\SceneMovieInput> */
    public ?array $movies;

    /** @var array<string> */
    public ?array $tag_ids;
    public ?string $cover_image;

    /** @var array<\Tests\Feature\Fixture\Stash\StashIDInput> */
    public ?array $stash_ids;

    /** @var array<string> */
    public ?array $file_ids;
    public mixed $custom_fields;

    /**
     * @param array<string> $urls
     * @param array<string> $gallery_ids
     * @param array<string> $performer_ids
     * @param array<\Tests\Feature\Fixture\Stash\SceneGroupInput> $groups
     * @param array<\Tests\Feature\Fixture\Stash\SceneMovieInput> $movies
     * @param array<string> $tag_ids
     * @param array<\Tests\Feature\Fixture\Stash\StashIDInput> $stash_ids
     * @param array<string> $file_ids
     */
    public static function new(
        ?string $title = null,
        ?string $code = null,
        ?string $details = null,
        ?string $director = null,
        ?string $url = null,
        ?array $urls = null,
        ?string $date = null,
        ?int $rating100 = null,
        ?bool $organized = null,
        ?string $studio_id = null,
        ?array $gallery_ids = null,
        ?array $performer_ids = null,
        ?array $groups = null,
        ?array $movies = null,
        ?array $tag_ids = null,
        ?string $cover_image = null,
        ?array $stash_ids = null,
        ?array $file_ids = null,
        mixed $custom_fields = null,
    ): self {
        $self = new self();
        $self->title = $title;
        $self->code = $code;
        $self->details = $details;
        $self->director = $director;
        $self->url = $url;
        $self->urls = $urls;
        $self->date = $date;
        $self->rating100 = $rating100;
        $self->organized = $organized;
        $self->studio_id = $studio_id;
        $self->gallery_ids = $gallery_ids;
        $self->performer_ids = $performer_ids;
        $self->groups = $groups;
        $self->movies = $movies;
        $self->tag_ids = $tag_ids;
        $self->cover_image = $cover_image;
        $self->stash_ids = $stash_ids;
        $self->file_ids = $file_ids;
        $self->custom_fields = $custom_fields;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('title', $data)) {
            $self->title = $data['title'];
        }
        if (array_key_exists('code', $data)) {
            $self->code = $data['code'];
        }
        if (array_key_exists('details', $data)) {
            $self->details = $data['details'];
        }
        if (array_key_exists('director', $data)) {
            $self->director = $data['director'];
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
        if (array_key_exists('date', $data)) {
            $self->date = $data['date'];
        }
        if (array_key_exists('rating100', $data)) {
            $self->rating100 = $data['rating100'];
        }
        if (array_key_exists('organized', $data)) {
            $self->organized = $data['organized'];
        }
        if (array_key_exists('studio_id', $data)) {
            $self->studio_id = $data['studio_id'];
        }
        if (array_key_exists('gallery_ids', $data)) {
            $self->gallery_ids = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['gallery_ids'] ?? []);
        }
        if (array_key_exists('performer_ids', $data)) {
            $self->performer_ids = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['performer_ids'] ?? []);
        }
        if (array_key_exists('groups', $data)) {
            $self->groups = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\SceneGroupInput::fromArray($data);
            }, $data['groups'] ?? []);
        }
        if (array_key_exists('movies', $data)) {
            $self->movies = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\SceneMovieInput::fromArray($data);
            }, $data['movies'] ?? []);
        }
        if (array_key_exists('tag_ids', $data)) {
            $self->tag_ids = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['tag_ids'] ?? []);
        }
        if (array_key_exists('cover_image', $data)) {
            $self->cover_image = $data['cover_image'];
        }
        if (array_key_exists('stash_ids', $data)) {
            $self->stash_ids = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\StashIDInput::fromArray($data);
            }, $data['stash_ids'] ?? []);
        }
        if (array_key_exists('file_ids', $data)) {
            $self->file_ids = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['file_ids'] ?? []);
        }
        if (array_key_exists('custom_fields', $data)) {
            $self->custom_fields = $data['custom_fields'];
        }

        return $self;
    }
}
