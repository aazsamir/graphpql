<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class Tag implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $id;
    public string $name;
    public ?string $sort_name;
    public ?string $description;

    /** @var array<string> */
    public array $aliases;
    public bool $ignore_auto_tag;
    public \DateTimeInterface $created_at;
    public \DateTimeInterface $updated_at;
    public bool $favorite;

    /** @var array<\Tests\Feature\Fixture\Stash\StashID> */
    public array $stash_ids;
    public ?string $image_path;
    public int $scene_count;
    public int $scene_marker_count;
    public int $image_count;
    public int $gallery_count;
    public int $performer_count;
    public int $studio_count;
    public int $group_count;
    public int $movie_count;

    /** @var array<\Tests\Feature\Fixture\Stash\Tag> */
    public array $parents;

    /** @var array<\Tests\Feature\Fixture\Stash\Tag> */
    public array $children;
    public int $parent_count;
    public int $child_count;
    public mixed $custom_fields;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\TagField<mixed>
     */
    public static function id(): Fields\TagField
    {
        return \Tests\Feature\Fixture\Stash\Fields\TagField::id();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\TagField<mixed>
     */
    public static function name(): Fields\TagField
    {
        return \Tests\Feature\Fixture\Stash\Fields\TagField::name();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\TagField<mixed>
     */
    public static function sort_name(): Fields\TagField
    {
        return \Tests\Feature\Fixture\Stash\Fields\TagField::sort_name();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\TagField<mixed>
     */
    public static function description(): Fields\TagField
    {
        return \Tests\Feature\Fixture\Stash\Fields\TagField::description();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\TagField<mixed>
     */
    public static function aliases(): Fields\TagField
    {
        return \Tests\Feature\Fixture\Stash\Fields\TagField::aliases();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\TagField<mixed>
     */
    public static function ignore_auto_tag(): Fields\TagField
    {
        return \Tests\Feature\Fixture\Stash\Fields\TagField::ignore_auto_tag();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\TagField<mixed>
     */
    public static function created_at(): Fields\TagField
    {
        return \Tests\Feature\Fixture\Stash\Fields\TagField::created_at();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\TagField<mixed>
     */
    public static function updated_at(): Fields\TagField
    {
        return \Tests\Feature\Fixture\Stash\Fields\TagField::updated_at();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\TagField<mixed>
     */
    public static function favorite(): Fields\TagField
    {
        return \Tests\Feature\Fixture\Stash\Fields\TagField::favorite();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\TagField<\Tests\Feature\Fixture\Stash\SelectionSet\StashIDSelectionSet>
     */
    public static function stash_ids(): Fields\TagField
    {
        return \Tests\Feature\Fixture\Stash\Fields\TagField::stash_ids();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\TagField<mixed>
     */
    public static function image_path(): Fields\TagField
    {
        return \Tests\Feature\Fixture\Stash\Fields\TagField::image_path();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\TagField<mixed>
     */
    public static function scene_count(?int $depth): Fields\TagField
    {
        return \Tests\Feature\Fixture\Stash\Fields\TagField::scene_count($depth,);
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\TagField<mixed>
     */
    public static function scene_marker_count(?int $depth): Fields\TagField
    {
        return \Tests\Feature\Fixture\Stash\Fields\TagField::scene_marker_count($depth,);
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\TagField<mixed>
     */
    public static function image_count(?int $depth): Fields\TagField
    {
        return \Tests\Feature\Fixture\Stash\Fields\TagField::image_count($depth,);
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\TagField<mixed>
     */
    public static function gallery_count(?int $depth): Fields\TagField
    {
        return \Tests\Feature\Fixture\Stash\Fields\TagField::gallery_count($depth,);
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\TagField<mixed>
     */
    public static function performer_count(?int $depth): Fields\TagField
    {
        return \Tests\Feature\Fixture\Stash\Fields\TagField::performer_count($depth,);
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\TagField<mixed>
     */
    public static function studio_count(?int $depth): Fields\TagField
    {
        return \Tests\Feature\Fixture\Stash\Fields\TagField::studio_count($depth,);
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\TagField<mixed>
     */
    public static function group_count(?int $depth): Fields\TagField
    {
        return \Tests\Feature\Fixture\Stash\Fields\TagField::group_count($depth,);
    }

    /**
     * @deprecated use group_count instead
     * @return \Tests\Feature\Fixture\Stash\Fields\TagField<mixed>
     */
    public static function movie_count(?int $depth): Fields\TagField
    {
        return \Tests\Feature\Fixture\Stash\Fields\TagField::movie_count($depth,);
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\TagField<\Tests\Feature\Fixture\Stash\SelectionSet\TagSelectionSet>
     */
    public static function parents(): Fields\TagField
    {
        return \Tests\Feature\Fixture\Stash\Fields\TagField::parents();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\TagField<\Tests\Feature\Fixture\Stash\SelectionSet\TagSelectionSet>
     */
    public static function children(): Fields\TagField
    {
        return \Tests\Feature\Fixture\Stash\Fields\TagField::children();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\TagField<mixed>
     */
    public static function parent_count(): Fields\TagField
    {
        return \Tests\Feature\Fixture\Stash\Fields\TagField::parent_count();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\TagField<mixed>
     */
    public static function child_count(): Fields\TagField
    {
        return \Tests\Feature\Fixture\Stash\Fields\TagField::child_count();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\TagField<mixed>
     */
    public static function custom_fields(): Fields\TagField
    {
        return \Tests\Feature\Fixture\Stash\Fields\TagField::custom_fields();
    }

    /**
     * @param array<string> $aliases
     * @param array<\Tests\Feature\Fixture\Stash\StashID> $stash_ids
     * @param array<\Tests\Feature\Fixture\Stash\Tag> $parents
     * @param array<\Tests\Feature\Fixture\Stash\Tag> $children
     */
    public static function new(
        string $id,
        string $name,
        array $aliases,
        bool $ignore_auto_tag,
        \DateTimeInterface $created_at,
        \DateTimeInterface $updated_at,
        bool $favorite,
        array $stash_ids,
        int $scene_count,
        int $scene_marker_count,
        int $image_count,
        int $gallery_count,
        int $performer_count,
        int $studio_count,
        int $group_count,
        int $movie_count,
        array $parents,
        array $children,
        int $parent_count,
        int $child_count,
        mixed $custom_fields,
        ?string $sort_name = null,
        ?string $description = null,
        ?string $image_path = null,
    ): self {
        $self = new self();
        $self->id = $id;
        $self->name = $name;
        $self->aliases = $aliases;
        $self->ignore_auto_tag = $ignore_auto_tag;
        $self->created_at = $created_at;
        $self->updated_at = $updated_at;
        $self->favorite = $favorite;
        $self->stash_ids = $stash_ids;
        $self->scene_count = $scene_count;
        $self->scene_marker_count = $scene_marker_count;
        $self->image_count = $image_count;
        $self->gallery_count = $gallery_count;
        $self->performer_count = $performer_count;
        $self->studio_count = $studio_count;
        $self->group_count = $group_count;
        $self->movie_count = $movie_count;
        $self->parents = $parents;
        $self->children = $children;
        $self->parent_count = $parent_count;
        $self->child_count = $child_count;
        $self->custom_fields = $custom_fields;
        $self->sort_name = $sort_name;
        $self->description = $description;
        $self->image_path = $image_path;

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
        if (array_key_exists('created_at', $data)) {
            $self->created_at = new \DateTimeImmutable($data['created_at']);
        }
        if (array_key_exists('updated_at', $data)) {
            $self->updated_at = new \DateTimeImmutable($data['updated_at']);
        }
        if (array_key_exists('favorite', $data)) {
            $self->favorite = $data['favorite'];
        }
        if (array_key_exists('stash_ids', $data)) {
            $self->stash_ids = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\StashID::fromArray($data);
            }, $data['stash_ids'] ?? []);
        }
        if (array_key_exists('scene_count', $data)) {
            $self->scene_count = $data['scene_count'];
        }
        if (array_key_exists('scene_marker_count', $data)) {
            $self->scene_marker_count = $data['scene_marker_count'];
        }
        if (array_key_exists('image_count', $data)) {
            $self->image_count = $data['image_count'];
        }
        if (array_key_exists('gallery_count', $data)) {
            $self->gallery_count = $data['gallery_count'];
        }
        if (array_key_exists('performer_count', $data)) {
            $self->performer_count = $data['performer_count'];
        }
        if (array_key_exists('studio_count', $data)) {
            $self->studio_count = $data['studio_count'];
        }
        if (array_key_exists('group_count', $data)) {
            $self->group_count = $data['group_count'];
        }
        if (array_key_exists('movie_count', $data)) {
            $self->movie_count = $data['movie_count'];
        }
        if (array_key_exists('parents', $data)) {
            $self->parents = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\Tag::fromArray($data);
            }, $data['parents'] ?? []);
        }
        if (array_key_exists('children', $data)) {
            $self->children = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\Tag::fromArray($data);
            }, $data['children'] ?? []);
        }
        if (array_key_exists('parent_count', $data)) {
            $self->parent_count = $data['parent_count'];
        }
        if (array_key_exists('child_count', $data)) {
            $self->child_count = $data['child_count'];
        }
        if (array_key_exists('custom_fields', $data)) {
            $self->custom_fields = $data['custom_fields'];
        }
        if (array_key_exists('sort_name', $data)) {
            $self->sort_name = $data['sort_name'];
        }
        if (array_key_exists('description', $data)) {
            $self->description = $data['description'];
        }
        if (array_key_exists('image_path', $data)) {
            $self->image_path = $data['image_path'];
        }

        return $self;
    }
}
