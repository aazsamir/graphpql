<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class GroupCreateInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $name;
    public ?string $aliases;
    public ?int $duration;
    public ?string $date;
    public ?int $rating100;
    public ?string $studio_id;
    public ?string $director;
    public ?string $synopsis;

    /** @var array<string> */
    public ?array $urls;

    /** @var array<string> */
    public ?array $tag_ids;

    /** @var array<\Tests\Feature\Fixture\Stash\GroupDescriptionInput> */
    public ?array $containing_groups;

    /** @var array<\Tests\Feature\Fixture\Stash\GroupDescriptionInput> */
    public ?array $sub_groups;
    public ?string $front_image;
    public ?string $back_image;
    public mixed $custom_fields;

    /**
     * @param array<string> $urls
     * @param array<string> $tag_ids
     * @param array<\Tests\Feature\Fixture\Stash\GroupDescriptionInput> $containing_groups
     * @param array<\Tests\Feature\Fixture\Stash\GroupDescriptionInput> $sub_groups
     */
    public static function new(
        string $name,
        ?string $aliases = null,
        ?int $duration = null,
        ?string $date = null,
        ?int $rating100 = null,
        ?string $studio_id = null,
        ?string $director = null,
        ?string $synopsis = null,
        ?array $urls = null,
        ?array $tag_ids = null,
        ?array $containing_groups = null,
        ?array $sub_groups = null,
        ?string $front_image = null,
        ?string $back_image = null,
        mixed $custom_fields = null,
    ): self {
        $self = new self();
        $self->name = $name;
        $self->aliases = $aliases;
        $self->duration = $duration;
        $self->date = $date;
        $self->rating100 = $rating100;
        $self->studio_id = $studio_id;
        $self->director = $director;
        $self->synopsis = $synopsis;
        $self->urls = $urls;
        $self->tag_ids = $tag_ids;
        $self->containing_groups = $containing_groups;
        $self->sub_groups = $sub_groups;
        $self->front_image = $front_image;
        $self->back_image = $back_image;
        $self->custom_fields = $custom_fields;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
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
        if (array_key_exists('containing_groups', $data)) {
            $self->containing_groups = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\GroupDescriptionInput::fromArray($data);
            }, $data['containing_groups'] ?? []);
        }
        if (array_key_exists('sub_groups', $data)) {
            $self->sub_groups = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\GroupDescriptionInput::fromArray($data);
            }, $data['sub_groups'] ?? []);
        }
        if (array_key_exists('front_image', $data)) {
            $self->front_image = $data['front_image'];
        }
        if (array_key_exists('back_image', $data)) {
            $self->back_image = $data['back_image'];
        }
        if (array_key_exists('custom_fields', $data)) {
            $self->custom_fields = $data['custom_fields'];
        }

        return $self;
    }
}
