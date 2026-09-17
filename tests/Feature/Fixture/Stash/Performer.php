<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class Performer implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $id;
    public string $name;
    public ?string $disambiguation;
    public ?string $url;

    /** @var array<string> */
    public ?array $urls;
    public ?GenderEnum $gender;
    public ?string $twitter;
    public ?string $instagram;
    public ?string $birthdate;
    public ?string $ethnicity;
    public ?string $country;
    public ?string $eye_color;
    public ?int $height_cm;
    public ?string $measurements;
    public ?string $fake_tits;
    public ?float $penis_length;
    public ?CircumcisedEnum $circumcised;
    public ?string $career_length;
    public ?string $career_start;
    public ?string $career_end;
    public ?string $tattoos;
    public ?string $piercings;

    /** @var array<string> */
    public array $alias_list;
    public bool $favorite;

    /** @var array<\Tests\Feature\Fixture\Stash\Tag> */
    public array $tags;
    public bool $ignore_auto_tag;
    public ?string $image_path;
    public int $scene_count;
    public int $image_count;
    public int $gallery_count;
    public int $group_count;
    public int $movie_count;
    public int $performer_count;
    public ?int $o_counter;

    /** @var array<\Tests\Feature\Fixture\Stash\Scene> */
    public array $scenes;

    /** @var array<\Tests\Feature\Fixture\Stash\StashID> */
    public array $stash_ids;
    public ?int $rating100;
    public ?string $details;
    public ?string $death_date;
    public ?string $hair_color;
    public ?int $weight;
    public \DateTimeInterface $created_at;
    public \DateTimeInterface $updated_at;

    /** @var array<\Tests\Feature\Fixture\Stash\Group> */
    public array $groups;

    /** @var array<\Tests\Feature\Fixture\Stash\Movie> */
    public array $movies;
    public mixed $custom_fields;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function id(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::id();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function name(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::name();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function disambiguation(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::disambiguation();
    }

    /**
     * @deprecated Use urls
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function url(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::url();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function urls(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::urls();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function gender(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::gender();
    }

    /**
     * @deprecated Use urls
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function twitter(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::twitter();
    }

    /**
     * @deprecated Use urls
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function instagram(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::instagram();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function birthdate(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::birthdate();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function ethnicity(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::ethnicity();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function country(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::country();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function eye_color(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::eye_color();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function height_cm(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::height_cm();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function measurements(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::measurements();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function fake_tits(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::fake_tits();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function penis_length(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::penis_length();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function circumcised(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::circumcised();
    }

    /**
     * @deprecated Use career_start and career_end
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function career_length(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::career_length();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function career_start(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::career_start();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function career_end(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::career_end();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function tattoos(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::tattoos();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function piercings(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::piercings();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function alias_list(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::alias_list();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function favorite(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::favorite();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<\Tests\Feature\Fixture\Stash\SelectionSet\TagSelectionSet>
     */
    public static function tags(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::tags();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function ignore_auto_tag(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::ignore_auto_tag();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function image_path(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::image_path();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function scene_count(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::scene_count();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function image_count(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::image_count();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function gallery_count(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::gallery_count();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function group_count(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::group_count();
    }

    /**
     * @deprecated use group_count instead
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function movie_count(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::movie_count();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function performer_count(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::performer_count();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function o_counter(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::o_counter();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<\Tests\Feature\Fixture\Stash\SelectionSet\SceneSelectionSet>
     */
    public static function scenes(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::scenes();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<\Tests\Feature\Fixture\Stash\SelectionSet\StashIDSelectionSet>
     */
    public static function stash_ids(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::stash_ids();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function rating100(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::rating100();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function details(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::details();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function death_date(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::death_date();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function hair_color(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::hair_color();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function weight(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::weight();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function created_at(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::created_at();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function updated_at(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::updated_at();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<\Tests\Feature\Fixture\Stash\SelectionSet\GroupSelectionSet>
     */
    public static function groups(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::groups();
    }

    /**
     * @deprecated use groups instead
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<\Tests\Feature\Fixture\Stash\SelectionSet\MovieSelectionSet>
     */
    public static function movies(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::movies();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PerformerField<mixed>
     */
    public static function custom_fields(): Fields\PerformerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PerformerField::custom_fields();
    }

    /**
     * @param array<string> $alias_list
     * @param array<\Tests\Feature\Fixture\Stash\Tag> $tags
     * @param array<\Tests\Feature\Fixture\Stash\Scene> $scenes
     * @param array<\Tests\Feature\Fixture\Stash\StashID> $stash_ids
     * @param array<\Tests\Feature\Fixture\Stash\Group> $groups
     * @param array<\Tests\Feature\Fixture\Stash\Movie> $movies
     * @param array<string> $urls
     */
    public static function new(
        string $id,
        string $name,
        array $alias_list,
        bool $favorite,
        array $tags,
        bool $ignore_auto_tag,
        int $scene_count,
        int $image_count,
        int $gallery_count,
        int $group_count,
        int $movie_count,
        int $performer_count,
        array $scenes,
        array $stash_ids,
        \DateTimeInterface $created_at,
        \DateTimeInterface $updated_at,
        array $groups,
        array $movies,
        mixed $custom_fields,
        ?string $disambiguation = null,
        ?string $url = null,
        ?array $urls = null,
        ?GenderEnum $gender = null,
        ?string $twitter = null,
        ?string $instagram = null,
        ?string $birthdate = null,
        ?string $ethnicity = null,
        ?string $country = null,
        ?string $eye_color = null,
        ?int $height_cm = null,
        ?string $measurements = null,
        ?string $fake_tits = null,
        ?float $penis_length = null,
        ?CircumcisedEnum $circumcised = null,
        ?string $career_length = null,
        ?string $career_start = null,
        ?string $career_end = null,
        ?string $tattoos = null,
        ?string $piercings = null,
        ?string $image_path = null,
        ?int $o_counter = null,
        ?int $rating100 = null,
        ?string $details = null,
        ?string $death_date = null,
        ?string $hair_color = null,
        ?int $weight = null,
    ): self {
        $self = new self();
        $self->id = $id;
        $self->name = $name;
        $self->alias_list = $alias_list;
        $self->favorite = $favorite;
        $self->tags = $tags;
        $self->ignore_auto_tag = $ignore_auto_tag;
        $self->scene_count = $scene_count;
        $self->image_count = $image_count;
        $self->gallery_count = $gallery_count;
        $self->group_count = $group_count;
        $self->movie_count = $movie_count;
        $self->performer_count = $performer_count;
        $self->scenes = $scenes;
        $self->stash_ids = $stash_ids;
        $self->created_at = $created_at;
        $self->updated_at = $updated_at;
        $self->groups = $groups;
        $self->movies = $movies;
        $self->custom_fields = $custom_fields;
        $self->disambiguation = $disambiguation;
        $self->url = $url;
        $self->urls = $urls;
        $self->gender = $gender;
        $self->twitter = $twitter;
        $self->instagram = $instagram;
        $self->birthdate = $birthdate;
        $self->ethnicity = $ethnicity;
        $self->country = $country;
        $self->eye_color = $eye_color;
        $self->height_cm = $height_cm;
        $self->measurements = $measurements;
        $self->fake_tits = $fake_tits;
        $self->penis_length = $penis_length;
        $self->circumcised = $circumcised;
        $self->career_length = $career_length;
        $self->career_start = $career_start;
        $self->career_end = $career_end;
        $self->tattoos = $tattoos;
        $self->piercings = $piercings;
        $self->image_path = $image_path;
        $self->o_counter = $o_counter;
        $self->rating100 = $rating100;
        $self->details = $details;
        $self->death_date = $death_date;
        $self->hair_color = $hair_color;
        $self->weight = $weight;

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
        if (array_key_exists('alias_list', $data)) {
            $self->alias_list = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['alias_list'] ?? []);
        }
        if (array_key_exists('favorite', $data)) {
            $self->favorite = $data['favorite'];
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
        if (array_key_exists('scene_count', $data)) {
            $self->scene_count = $data['scene_count'];
        }
        if (array_key_exists('image_count', $data)) {
            $self->image_count = $data['image_count'];
        }
        if (array_key_exists('gallery_count', $data)) {
            $self->gallery_count = $data['gallery_count'];
        }
        if (array_key_exists('group_count', $data)) {
            $self->group_count = $data['group_count'];
        }
        if (array_key_exists('movie_count', $data)) {
            $self->movie_count = $data['movie_count'];
        }
        if (array_key_exists('performer_count', $data)) {
            $self->performer_count = $data['performer_count'];
        }
        if (array_key_exists('scenes', $data)) {
            $self->scenes = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\Scene::fromArray($data);
            }, $data['scenes'] ?? []);
        }
        if (array_key_exists('stash_ids', $data)) {
            $self->stash_ids = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\StashID::fromArray($data);
            }, $data['stash_ids'] ?? []);
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
        if (array_key_exists('disambiguation', $data)) {
            $self->disambiguation = $data['disambiguation'];
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
        if (array_key_exists('gender', $data)) {
            $self->gender = \Tests\Feature\Fixture\Stash\GenderEnum::from($data['gender']);
        }
        if (array_key_exists('twitter', $data)) {
            $self->twitter = $data['twitter'];
        }
        if (array_key_exists('instagram', $data)) {
            $self->instagram = $data['instagram'];
        }
        if (array_key_exists('birthdate', $data)) {
            $self->birthdate = $data['birthdate'];
        }
        if (array_key_exists('ethnicity', $data)) {
            $self->ethnicity = $data['ethnicity'];
        }
        if (array_key_exists('country', $data)) {
            $self->country = $data['country'];
        }
        if (array_key_exists('eye_color', $data)) {
            $self->eye_color = $data['eye_color'];
        }
        if (array_key_exists('height_cm', $data)) {
            $self->height_cm = $data['height_cm'];
        }
        if (array_key_exists('measurements', $data)) {
            $self->measurements = $data['measurements'];
        }
        if (array_key_exists('fake_tits', $data)) {
            $self->fake_tits = $data['fake_tits'];
        }
        if (array_key_exists('penis_length', $data)) {
            $self->penis_length = $data['penis_length'];
        }
        if (array_key_exists('circumcised', $data)) {
            $self->circumcised = \Tests\Feature\Fixture\Stash\CircumcisedEnum::from($data['circumcised']);
        }
        if (array_key_exists('career_length', $data)) {
            $self->career_length = $data['career_length'];
        }
        if (array_key_exists('career_start', $data)) {
            $self->career_start = $data['career_start'];
        }
        if (array_key_exists('career_end', $data)) {
            $self->career_end = $data['career_end'];
        }
        if (array_key_exists('tattoos', $data)) {
            $self->tattoos = $data['tattoos'];
        }
        if (array_key_exists('piercings', $data)) {
            $self->piercings = $data['piercings'];
        }
        if (array_key_exists('image_path', $data)) {
            $self->image_path = $data['image_path'];
        }
        if (array_key_exists('o_counter', $data)) {
            $self->o_counter = $data['o_counter'];
        }
        if (array_key_exists('rating100', $data)) {
            $self->rating100 = $data['rating100'];
        }
        if (array_key_exists('details', $data)) {
            $self->details = $data['details'];
        }
        if (array_key_exists('death_date', $data)) {
            $self->death_date = $data['death_date'];
        }
        if (array_key_exists('hair_color', $data)) {
            $self->hair_color = $data['hair_color'];
        }
        if (array_key_exists('weight', $data)) {
            $self->weight = $data['weight'];
        }

        return $self;
    }
}
