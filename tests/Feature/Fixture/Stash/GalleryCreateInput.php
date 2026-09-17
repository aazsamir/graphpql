<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class GalleryCreateInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $title;
    public ?string $code;
    public ?string $url;

    /** @var array<string> */
    public ?array $urls;
    public ?string $date;
    public ?string $details;
    public ?string $photographer;
    public ?int $rating100;
    public ?bool $organized;

    /** @var array<string> */
    public ?array $scene_ids;
    public ?string $studio_id;

    /** @var array<string> */
    public ?array $tag_ids;

    /** @var array<string> */
    public ?array $performer_ids;
    public mixed $custom_fields;

    /**
     * @param array<string> $urls
     * @param array<string> $scene_ids
     * @param array<string> $tag_ids
     * @param array<string> $performer_ids
     */
    public static function new(
        string $title,
        ?string $code = null,
        ?string $url = null,
        ?array $urls = null,
        ?string $date = null,
        ?string $details = null,
        ?string $photographer = null,
        ?int $rating100 = null,
        ?bool $organized = null,
        ?array $scene_ids = null,
        ?string $studio_id = null,
        ?array $tag_ids = null,
        ?array $performer_ids = null,
        mixed $custom_fields = null,
    ): self {
        $self = new self();
        $self->title = $title;
        $self->code = $code;
        $self->url = $url;
        $self->urls = $urls;
        $self->date = $date;
        $self->details = $details;
        $self->photographer = $photographer;
        $self->rating100 = $rating100;
        $self->organized = $organized;
        $self->scene_ids = $scene_ids;
        $self->studio_id = $studio_id;
        $self->tag_ids = $tag_ids;
        $self->performer_ids = $performer_ids;
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
        if (array_key_exists('details', $data)) {
            $self->details = $data['details'];
        }
        if (array_key_exists('photographer', $data)) {
            $self->photographer = $data['photographer'];
        }
        if (array_key_exists('rating100', $data)) {
            $self->rating100 = $data['rating100'];
        }
        if (array_key_exists('organized', $data)) {
            $self->organized = $data['organized'];
        }
        if (array_key_exists('scene_ids', $data)) {
            $self->scene_ids = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['scene_ids'] ?? []);
        }
        if (array_key_exists('studio_id', $data)) {
            $self->studio_id = $data['studio_id'];
        }
        if (array_key_exists('tag_ids', $data)) {
            $self->tag_ids = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['tag_ids'] ?? []);
        }
        if (array_key_exists('performer_ids', $data)) {
            $self->performer_ids = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['performer_ids'] ?? []);
        }
        if (array_key_exists('custom_fields', $data)) {
            $self->custom_fields = $data['custom_fields'];
        }

        return $self;
    }
}
