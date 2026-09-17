<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class Studio implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $id;
    public string $name;
    public ?string $url;

    /** @var array<string> */
    public array $urls;
    public ?Studio $parent_studio;

    /** @var array<\Tests\Feature\Fixture\Stash\Studio> */
    public array $child_studios;

    /** @var array<string> */
    public array $aliases;

    /** @var array<\Tests\Feature\Fixture\Stash\Tag> */
    public array $tags;
    public bool $ignore_auto_tag;
    public bool $organized;
    public ?string $image_path;
    public int $scene_count;
    public int $image_count;
    public int $gallery_count;
    public int $performer_count;
    public int $group_count;
    public int $movie_count;

    /** @var array<\Tests\Feature\Fixture\Stash\StashID> */
    public array $stash_ids;
    public ?int $rating100;
    public bool $favorite;
    public ?string $details;
    public \DateTimeInterface $created_at;
    public \DateTimeInterface $updated_at;

    /** @var array<\Tests\Feature\Fixture\Stash\Group> */
    public array $groups;

    /** @var array<\Tests\Feature\Fixture\Stash\Movie> */
    public array $movies;
    public ?int $o_counter;
    public mixed $custom_fields;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StudioField<mixed>
     */
    public static function id(): Fields\StudioField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StudioField::id();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StudioField<mixed>
     */
    public static function name(): Fields\StudioField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StudioField::name();
    }

    /**
     * @deprecated Use urls
     * @return \Tests\Feature\Fixture\Stash\Fields\StudioField<mixed>
     */
    public static function url(): Fields\StudioField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StudioField::url();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StudioField<mixed>
     */
    public static function urls(): Fields\StudioField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StudioField::urls();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StudioField<\Tests\Feature\Fixture\Stash\SelectionSet\StudioSelectionSet>
     */
    public static function parent_studio(): Fields\StudioField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StudioField::parent_studio();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StudioField<\Tests\Feature\Fixture\Stash\SelectionSet\StudioSelectionSet>
     */
    public static function child_studios(): Fields\StudioField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StudioField::child_studios();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StudioField<mixed>
     */
    public static function aliases(): Fields\StudioField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StudioField::aliases();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StudioField<\Tests\Feature\Fixture\Stash\SelectionSet\TagSelectionSet>
     */
    public static function tags(): Fields\StudioField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StudioField::tags();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StudioField<mixed>
     */
    public static function ignore_auto_tag(): Fields\StudioField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StudioField::ignore_auto_tag();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StudioField<mixed>
     */
    public static function organized(): Fields\StudioField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StudioField::organized();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StudioField<mixed>
     */
    public static function image_path(): Fields\StudioField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StudioField::image_path();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StudioField<mixed>
     */
    public static function scene_count(?int $depth): Fields\StudioField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StudioField::scene_count($depth,);
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StudioField<mixed>
     */
    public static function image_count(?int $depth): Fields\StudioField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StudioField::image_count($depth,);
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StudioField<mixed>
     */
    public static function gallery_count(?int $depth): Fields\StudioField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StudioField::gallery_count($depth,);
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StudioField<mixed>
     */
    public static function performer_count(?int $depth): Fields\StudioField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StudioField::performer_count($depth,);
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StudioField<mixed>
     */
    public static function group_count(?int $depth): Fields\StudioField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StudioField::group_count($depth,);
    }

    /**
     * @deprecated use group_count instead
     * @return \Tests\Feature\Fixture\Stash\Fields\StudioField<mixed>
     */
    public static function movie_count(?int $depth): Fields\StudioField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StudioField::movie_count($depth,);
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StudioField<\Tests\Feature\Fixture\Stash\SelectionSet\StashIDSelectionSet>
     */
    public static function stash_ids(): Fields\StudioField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StudioField::stash_ids();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StudioField<mixed>
     */
    public static function rating100(): Fields\StudioField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StudioField::rating100();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StudioField<mixed>
     */
    public static function favorite(): Fields\StudioField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StudioField::favorite();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StudioField<mixed>
     */
    public static function details(): Fields\StudioField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StudioField::details();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StudioField<mixed>
     */
    public static function created_at(): Fields\StudioField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StudioField::created_at();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StudioField<mixed>
     */
    public static function updated_at(): Fields\StudioField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StudioField::updated_at();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StudioField<\Tests\Feature\Fixture\Stash\SelectionSet\GroupSelectionSet>
     */
    public static function groups(): Fields\StudioField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StudioField::groups();
    }

    /**
     * @deprecated use groups instead
     * @return \Tests\Feature\Fixture\Stash\Fields\StudioField<\Tests\Feature\Fixture\Stash\SelectionSet\MovieSelectionSet>
     */
    public static function movies(): Fields\StudioField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StudioField::movies();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StudioField<mixed>
     */
    public static function o_counter(): Fields\StudioField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StudioField::o_counter();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StudioField<mixed>
     */
    public static function custom_fields(): Fields\StudioField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StudioField::custom_fields();
    }

    /**
     * @param array<string> $urls
     * @param array<\Tests\Feature\Fixture\Stash\Studio> $child_studios
     * @param array<string> $aliases
     * @param array<\Tests\Feature\Fixture\Stash\Tag> $tags
     * @param array<\Tests\Feature\Fixture\Stash\StashID> $stash_ids
     * @param array<\Tests\Feature\Fixture\Stash\Group> $groups
     * @param array<\Tests\Feature\Fixture\Stash\Movie> $movies
     */
    public static function new(
        string $id,
        string $name,
        array $urls,
        array $child_studios,
        array $aliases,
        array $tags,
        bool $ignore_auto_tag,
        bool $organized,
        int $scene_count,
        int $image_count,
        int $gallery_count,
        int $performer_count,
        int $group_count,
        int $movie_count,
        array $stash_ids,
        bool $favorite,
        \DateTimeInterface $created_at,
        \DateTimeInterface $updated_at,
        array $groups,
        array $movies,
        mixed $custom_fields,
        ?string $url = null,
        ?Studio $parent_studio = null,
        ?string $image_path = null,
        ?int $rating100 = null,
        ?string $details = null,
        ?int $o_counter = null,
    ): self {
        $self = new self();
        $self->id = $id;
        $self->name = $name;
        $self->urls = $urls;
        $self->child_studios = $child_studios;
        $self->aliases = $aliases;
        $self->tags = $tags;
        $self->ignore_auto_tag = $ignore_auto_tag;
        $self->organized = $organized;
        $self->scene_count = $scene_count;
        $self->image_count = $image_count;
        $self->gallery_count = $gallery_count;
        $self->performer_count = $performer_count;
        $self->group_count = $group_count;
        $self->movie_count = $movie_count;
        $self->stash_ids = $stash_ids;
        $self->favorite = $favorite;
        $self->created_at = $created_at;
        $self->updated_at = $updated_at;
        $self->groups = $groups;
        $self->movies = $movies;
        $self->custom_fields = $custom_fields;
        $self->url = $url;
        $self->parent_studio = $parent_studio;
        $self->image_path = $image_path;
        $self->rating100 = $rating100;
        $self->details = $details;
        $self->o_counter = $o_counter;

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
        if (array_key_exists('child_studios', $data)) {
            $self->child_studios = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\Studio::fromArray($data);
            }, $data['child_studios'] ?? []);
        }
        if (array_key_exists('aliases', $data)) {
            $self->aliases = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['aliases'] ?? []);
        }
        if (array_key_exists('tags', $data)) {
            $self->tags = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\Tag::fromArray($data);
            }, $data['tags'] ?? []);
        }
        if (array_key_exists('ignore_auto_tag', $data)) {
            $self->ignore_auto_tag = $data['ignore_auto_tag'];
        }
        if (array_key_exists('organized', $data)) {
            $self->organized = $data['organized'];
        }
        if (array_key_exists('scene_count', $data)) {
            $self->scene_count = $data['scene_count'];
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
        if (array_key_exists('group_count', $data)) {
            $self->group_count = $data['group_count'];
        }
        if (array_key_exists('movie_count', $data)) {
            $self->movie_count = $data['movie_count'];
        }
        if (array_key_exists('stash_ids', $data)) {
            $self->stash_ids = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\StashID::fromArray($data);
            }, $data['stash_ids'] ?? []);
        }
        if (array_key_exists('favorite', $data)) {
            $self->favorite = $data['favorite'];
        }
        if (array_key_exists('created_at', $data)) {
            $self->created_at = new \DateTimeImmutable($data['created_at']);
        }
        if (array_key_exists('updated_at', $data)) {
            $self->updated_at = new \DateTimeImmutable($data['updated_at']);
        }
        if (array_key_exists('groups', $data)) {
            $self->groups = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\Group::fromArray($data);
            }, $data['groups'] ?? []);
        }
        if (array_key_exists('movies', $data)) {
            $self->movies = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\Movie::fromArray($data);
            }, $data['movies'] ?? []);
        }
        if (array_key_exists('custom_fields', $data)) {
            $self->custom_fields = $data['custom_fields'];
        }
        if (array_key_exists('url', $data)) {
            $self->url = $data['url'];
        }
        if (array_key_exists('parent_studio', $data)) {
            $self->parent_studio = \Tests\Feature\Fixture\Stash\Studio::fromArray($data['parent_studio']);
        }
        if (array_key_exists('image_path', $data)) {
            $self->image_path = $data['image_path'];
        }
        if (array_key_exists('rating100', $data)) {
            $self->rating100 = $data['rating100'];
        }
        if (array_key_exists('details', $data)) {
            $self->details = $data['details'];
        }
        if (array_key_exists('o_counter', $data)) {
            $self->o_counter = $data['o_counter'];
        }

        return $self;
    }
}
