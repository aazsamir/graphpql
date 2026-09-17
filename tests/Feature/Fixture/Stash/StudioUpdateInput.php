<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class StudioUpdateInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $id;
    public ?string $name;
    public ?string $url;

    /** @var array<string> */
    public ?array $urls;
    public ?string $parent_id;
    public ?string $image;

    /** @var array<\Tests\Feature\Fixture\Stash\StashIDInput> */
    public ?array $stash_ids;
    public ?int $rating100;
    public ?bool $favorite;
    public ?string $details;

    /** @var array<string> */
    public ?array $aliases;

    /** @var array<string> */
    public ?array $tag_ids;
    public ?bool $ignore_auto_tag;
    public ?bool $organized;
    public ?CustomFieldsInput $custom_fields;

    /**
     * @param array<string> $urls
     * @param array<\Tests\Feature\Fixture\Stash\StashIDInput> $stash_ids
     * @param array<string> $aliases
     * @param array<string> $tag_ids
     */
    public static function new(
        string $id,
        ?string $name = null,
        ?string $url = null,
        ?array $urls = null,
        ?string $parent_id = null,
        ?string $image = null,
        ?array $stash_ids = null,
        ?int $rating100 = null,
        ?bool $favorite = null,
        ?string $details = null,
        ?array $aliases = null,
        ?array $tag_ids = null,
        ?bool $ignore_auto_tag = null,
        ?bool $organized = null,
        ?CustomFieldsInput $custom_fields = null,
    ): self {
        $self = new self();
        $self->id = $id;
        $self->name = $name;
        $self->url = $url;
        $self->urls = $urls;
        $self->parent_id = $parent_id;
        $self->image = $image;
        $self->stash_ids = $stash_ids;
        $self->rating100 = $rating100;
        $self->favorite = $favorite;
        $self->details = $details;
        $self->aliases = $aliases;
        $self->tag_ids = $tag_ids;
        $self->ignore_auto_tag = $ignore_auto_tag;
        $self->organized = $organized;
        $self->custom_fields = $custom_fields;

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
        if (array_key_exists('parent_id', $data)) {
            $self->parent_id = $data['parent_id'];
        }
        if (array_key_exists('image', $data)) {
            $self->image = $data['image'];
        }
        if (array_key_exists('stash_ids', $data)) {
            $self->stash_ids = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\StashIDInput::fromArray($data);
            }, $data['stash_ids'] ?? []);
        }
        if (array_key_exists('rating100', $data)) {
            $self->rating100 = $data['rating100'];
        }
        if (array_key_exists('favorite', $data)) {
            $self->favorite = $data['favorite'];
        }
        if (array_key_exists('details', $data)) {
            $self->details = $data['details'];
        }
        if (array_key_exists('aliases', $data)) {
            $self->aliases = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['aliases'] ?? []);
        }
        if (array_key_exists('tag_ids', $data)) {
            $self->tag_ids = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['tag_ids'] ?? []);
        }
        if (array_key_exists('ignore_auto_tag', $data)) {
            $self->ignore_auto_tag = $data['ignore_auto_tag'];
        }
        if (array_key_exists('organized', $data)) {
            $self->organized = $data['organized'];
        }
        if (array_key_exists('custom_fields', $data)) {
            $self->custom_fields = \Tests\Feature\Fixture\Stash\CustomFieldsInput::fromArray($data['custom_fields']);
        }

        return $self;
    }
}
