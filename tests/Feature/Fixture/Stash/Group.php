<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class Group implements \Aazsamir\Graphpql\Model\GraphObject
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

    /** @var array<string> */
    public array $urls;

    /** @var array<\Tests\Feature\Fixture\Stash\Tag> */
    public array $tags;
    public \DateTimeInterface $created_at;
    public \DateTimeInterface $updated_at;

    /** @var array<\Tests\Feature\Fixture\Stash\GroupDescription> */
    public array $containing_groups;

    /** @var array<\Tests\Feature\Fixture\Stash\GroupDescription> */
    public array $sub_groups;
    public ?string $front_image_path;
    public ?string $back_image_path;
    public int $scene_count;
    public int $performer_count;
    public int $sub_group_count;

    /** @var array<\Tests\Feature\Fixture\Stash\Scene> */
    public array $scenes;
    public ?int $o_counter;
    public mixed $custom_fields;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GroupField<mixed>
     */
    public static function id(): Fields\GroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GroupField::id();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GroupField<mixed>
     */
    public static function name(): Fields\GroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GroupField::name();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GroupField<mixed>
     */
    public static function aliases(): Fields\GroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GroupField::aliases();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GroupField<mixed>
     */
    public static function duration(): Fields\GroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GroupField::duration();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GroupField<mixed>
     */
    public static function date(): Fields\GroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GroupField::date();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GroupField<mixed>
     */
    public static function rating100(): Fields\GroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GroupField::rating100();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GroupField<\Tests\Feature\Fixture\Stash\SelectionSet\StudioSelectionSet>
     */
    public static function studio(): Fields\GroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GroupField::studio();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GroupField<mixed>
     */
    public static function director(): Fields\GroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GroupField::director();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GroupField<mixed>
     */
    public static function synopsis(): Fields\GroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GroupField::synopsis();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GroupField<mixed>
     */
    public static function urls(): Fields\GroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GroupField::urls();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GroupField<\Tests\Feature\Fixture\Stash\SelectionSet\TagSelectionSet>
     */
    public static function tags(): Fields\GroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GroupField::tags();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GroupField<mixed>
     */
    public static function created_at(): Fields\GroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GroupField::created_at();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GroupField<mixed>
     */
    public static function updated_at(): Fields\GroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GroupField::updated_at();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GroupField<\Tests\Feature\Fixture\Stash\SelectionSet\GroupDescriptionSelectionSet>
     */
    public static function containing_groups(): Fields\GroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GroupField::containing_groups();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GroupField<\Tests\Feature\Fixture\Stash\SelectionSet\GroupDescriptionSelectionSet>
     */
    public static function sub_groups(): Fields\GroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GroupField::sub_groups();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GroupField<mixed>
     */
    public static function front_image_path(): Fields\GroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GroupField::front_image_path();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GroupField<mixed>
     */
    public static function back_image_path(): Fields\GroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GroupField::back_image_path();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GroupField<mixed>
     */
    public static function scene_count(?int $depth): Fields\GroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GroupField::scene_count($depth,);
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GroupField<mixed>
     */
    public static function performer_count(?int $depth): Fields\GroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GroupField::performer_count($depth,);
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GroupField<mixed>
     */
    public static function sub_group_count(?int $depth): Fields\GroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GroupField::sub_group_count($depth,);
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GroupField<\Tests\Feature\Fixture\Stash\SelectionSet\SceneSelectionSet>
     */
    public static function scenes(): Fields\GroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GroupField::scenes();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GroupField<mixed>
     */
    public static function o_counter(): Fields\GroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GroupField::o_counter();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GroupField<mixed>
     */
    public static function custom_fields(): Fields\GroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GroupField::custom_fields();
    }

    /**
     * @param array<string> $urls
     * @param array<\Tests\Feature\Fixture\Stash\Tag> $tags
     * @param array<\Tests\Feature\Fixture\Stash\GroupDescription> $containing_groups
     * @param array<\Tests\Feature\Fixture\Stash\GroupDescription> $sub_groups
     * @param array<\Tests\Feature\Fixture\Stash\Scene> $scenes
     */
    public static function new(
        string $id,
        string $name,
        array $urls,
        array $tags,
        \DateTimeInterface $created_at,
        \DateTimeInterface $updated_at,
        array $containing_groups,
        array $sub_groups,
        int $scene_count,
        int $performer_count,
        int $sub_group_count,
        array $scenes,
        mixed $custom_fields,
        ?string $aliases = null,
        ?int $duration = null,
        ?string $date = null,
        ?int $rating100 = null,
        ?Studio $studio = null,
        ?string $director = null,
        ?string $synopsis = null,
        ?string $front_image_path = null,
        ?string $back_image_path = null,
        ?int $o_counter = null,
    ): self {
        $self = new self();
        $self->id = $id;
        $self->name = $name;
        $self->urls = $urls;
        $self->tags = $tags;
        $self->created_at = $created_at;
        $self->updated_at = $updated_at;
        $self->containing_groups = $containing_groups;
        $self->sub_groups = $sub_groups;
        $self->scene_count = $scene_count;
        $self->performer_count = $performer_count;
        $self->sub_group_count = $sub_group_count;
        $self->scenes = $scenes;
        $self->custom_fields = $custom_fields;
        $self->aliases = $aliases;
        $self->duration = $duration;
        $self->date = $date;
        $self->rating100 = $rating100;
        $self->studio = $studio;
        $self->director = $director;
        $self->synopsis = $synopsis;
        $self->front_image_path = $front_image_path;
        $self->back_image_path = $back_image_path;
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
        if (array_key_exists('containing_groups', $data)) {
            $self->containing_groups = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\GroupDescription::fromArray($data);
            }, $data['containing_groups'] ?? []);
        }
        if (array_key_exists('sub_groups', $data)) {
            $self->sub_groups = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\GroupDescription::fromArray($data);
            }, $data['sub_groups'] ?? []);
        }
        if (array_key_exists('scene_count', $data)) {
            $self->scene_count = $data['scene_count'];
        }
        if (array_key_exists('performer_count', $data)) {
            $self->performer_count = $data['performer_count'];
        }
        if (array_key_exists('sub_group_count', $data)) {
            $self->sub_group_count = $data['sub_group_count'];
        }
        if (array_key_exists('scenes', $data)) {
            $self->scenes = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\Scene::fromArray($data);
            }, $data['scenes'] ?? []);
        }
        if (array_key_exists('custom_fields', $data)) {
            $self->custom_fields = $data['custom_fields'];
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
        if (array_key_exists('front_image_path', $data)) {
            $self->front_image_path = $data['front_image_path'];
        }
        if (array_key_exists('back_image_path', $data)) {
            $self->back_image_path = $data['back_image_path'];
        }
        if (array_key_exists('o_counter', $data)) {
            $self->o_counter = $data['o_counter'];
        }

        return $self;
    }
}
