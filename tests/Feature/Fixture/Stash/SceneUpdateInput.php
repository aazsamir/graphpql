<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class SceneUpdateInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?string $clientMutationId;
    public string $id;
    public ?string $title;
    public ?string $code;
    public ?string $details;
    public ?string $director;
    public ?string $url;

    /** @var array<string> */
    public ?array $urls;
    public ?string $date;
    public ?int $rating100;
    public ?int $o_counter;
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
    public ?float $resume_time;
    public ?float $play_duration;
    public ?int $play_count;
    public ?string $primary_file_id;
    public ?CustomFieldsInput $custom_fields;

    /**
     * @param array<string> $urls
     * @param array<string> $gallery_ids
     * @param array<string> $performer_ids
     * @param array<\Tests\Feature\Fixture\Stash\SceneGroupInput> $groups
     * @param array<\Tests\Feature\Fixture\Stash\SceneMovieInput> $movies
     * @param array<string> $tag_ids
     * @param array<\Tests\Feature\Fixture\Stash\StashIDInput> $stash_ids
     */
    public static function new(
        string $id,
        ?string $clientMutationId = null,
        ?string $title = null,
        ?string $code = null,
        ?string $details = null,
        ?string $director = null,
        ?string $url = null,
        ?array $urls = null,
        ?string $date = null,
        ?int $rating100 = null,
        ?int $o_counter = null,
        ?bool $organized = null,
        ?string $studio_id = null,
        ?array $gallery_ids = null,
        ?array $performer_ids = null,
        ?array $groups = null,
        ?array $movies = null,
        ?array $tag_ids = null,
        ?string $cover_image = null,
        ?array $stash_ids = null,
        ?float $resume_time = null,
        ?float $play_duration = null,
        ?int $play_count = null,
        ?string $primary_file_id = null,
        ?CustomFieldsInput $custom_fields = null,
    ): self {
        $self = new self();
        $self->id = $id;
        $self->clientMutationId = $clientMutationId;
        $self->title = $title;
        $self->code = $code;
        $self->details = $details;
        $self->director = $director;
        $self->url = $url;
        $self->urls = $urls;
        $self->date = $date;
        $self->rating100 = $rating100;
        $self->o_counter = $o_counter;
        $self->organized = $organized;
        $self->studio_id = $studio_id;
        $self->gallery_ids = $gallery_ids;
        $self->performer_ids = $performer_ids;
        $self->groups = $groups;
        $self->movies = $movies;
        $self->tag_ids = $tag_ids;
        $self->cover_image = $cover_image;
        $self->stash_ids = $stash_ids;
        $self->resume_time = $resume_time;
        $self->play_duration = $play_duration;
        $self->play_count = $play_count;
        $self->primary_file_id = $primary_file_id;
        $self->custom_fields = $custom_fields;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('id', $data)) {
            $self->id = $data['id'];
        }
        if (array_key_exists('clientMutationId', $data)) {
            $self->clientMutationId = $data['clientMutationId'];
        }
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
        if (array_key_exists('o_counter', $data)) {
            $self->o_counter = $data['o_counter'];
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
        if (array_key_exists('resume_time', $data)) {
            $self->resume_time = $data['resume_time'];
        }
        if (array_key_exists('play_duration', $data)) {
            $self->play_duration = $data['play_duration'];
        }
        if (array_key_exists('play_count', $data)) {
            $self->play_count = $data['play_count'];
        }
        if (array_key_exists('primary_file_id', $data)) {
            $self->primary_file_id = $data['primary_file_id'];
        }
        if (array_key_exists('custom_fields', $data)) {
            $self->custom_fields = \Tests\Feature\Fixture\Stash\CustomFieldsInput::fromArray($data['custom_fields']);
        }

        return $self;
    }
}
