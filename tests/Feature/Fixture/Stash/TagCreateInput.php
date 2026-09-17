<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class TagCreateInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $name;
    public ?string $sort_name;
    public ?string $description;

    /** @var array<string> */
    public ?array $aliases;
    public ?bool $ignore_auto_tag;
    public ?bool $favorite;
    public ?string $image;

    /** @var array<\Tests\Feature\Fixture\Stash\StashIDInput> */
    public ?array $stash_ids;

    /** @var array<string> */
    public ?array $parent_ids;

    /** @var array<string> */
    public ?array $child_ids;
    public mixed $custom_fields;

    /**
     * @param array<string> $aliases
     * @param array<\Tests\Feature\Fixture\Stash\StashIDInput> $stash_ids
     * @param array<string> $parent_ids
     * @param array<string> $child_ids
     */
    public static function new(
        string $name,
        ?string $sort_name = null,
        ?string $description = null,
        ?array $aliases = null,
        ?bool $ignore_auto_tag = null,
        ?bool $favorite = null,
        ?string $image = null,
        ?array $stash_ids = null,
        ?array $parent_ids = null,
        ?array $child_ids = null,
        mixed $custom_fields = null,
    ): self {
        $self = new self();
        $self->name = $name;
        $self->sort_name = $sort_name;
        $self->description = $description;
        $self->aliases = $aliases;
        $self->ignore_auto_tag = $ignore_auto_tag;
        $self->favorite = $favorite;
        $self->image = $image;
        $self->stash_ids = $stash_ids;
        $self->parent_ids = $parent_ids;
        $self->child_ids = $child_ids;
        $self->custom_fields = $custom_fields;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('name', $data)) {
            $self->name = $data['name'];
        }
        if (array_key_exists('sort_name', $data)) {
            $self->sort_name = $data['sort_name'];
        }
        if (array_key_exists('description', $data)) {
            $self->description = $data['description'];
        }
        if (array_key_exists('aliases', $data)) {
            $self->aliases = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['aliases'] ?? []);
        }
        if (array_key_exists('ignore_auto_tag', $data)) {
            $self->ignore_auto_tag = $data['ignore_auto_tag'];
        }
        if (array_key_exists('favorite', $data)) {
            $self->favorite = $data['favorite'];
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
        if (array_key_exists('parent_ids', $data)) {
            $self->parent_ids = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['parent_ids'] ?? []);
        }
        if (array_key_exists('child_ids', $data)) {
            $self->child_ids = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['child_ids'] ?? []);
        }
        if (array_key_exists('custom_fields', $data)) {
            $self->custom_fields = $data['custom_fields'];
        }

        return $self;
    }
}
