<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class Scene implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $id;
    public ?string $title;
    public ?string $code;
    public ?string $details;
    public ?string $director;
    public ?string $url;

    /** @var array<string> */
    public array $urls;
    public ?string $date;
    public ?int $rating100;
    public bool $organized;
    public ?int $o_counter;
    public bool $interactive;
    public ?int $interactive_speed;

    /** @var array<\Tests\Feature\Fixture\Stash\VideoCaption> */
    public ?array $captions;
    public \DateTimeInterface $created_at;
    public \DateTimeInterface $updated_at;
    public ?\DateTimeInterface $last_played_at;
    public ?float $resume_time;
    public ?float $play_duration;
    public ?int $play_count;

    /** @var array<\DateTimeInterface> */
    public array $play_history;

    /** @var array<\DateTimeInterface> */
    public array $o_history;

    /** @var array<\Tests\Feature\Fixture\Stash\VideoFile> */
    public array $files;
    public ScenePathsType $paths;

    /** @var array<\Tests\Feature\Fixture\Stash\SceneMarker> */
    public array $scene_markers;

    /** @var array<\Tests\Feature\Fixture\Stash\Gallery> */
    public array $galleries;
    public ?Studio $studio;

    /** @var array<\Tests\Feature\Fixture\Stash\SceneGroup> */
    public array $groups;

    /** @var array<\Tests\Feature\Fixture\Stash\SceneMovie> */
    public array $movies;

    /** @var array<\Tests\Feature\Fixture\Stash\Tag> */
    public array $tags;

    /** @var array<\Tests\Feature\Fixture\Stash\Performer> */
    public array $performers;

    /** @var array<\Tests\Feature\Fixture\Stash\StashID> */
    public array $stash_ids;
    public mixed $custom_fields;

    /** @var array<\Tests\Feature\Fixture\Stash\SceneStreamEndpoint> */
    public array $sceneStreams;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneField<mixed>
     */
    public static function id(): Fields\SceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneField::id();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneField<mixed>
     */
    public static function title(): Fields\SceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneField::title();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneField<mixed>
     */
    public static function code(): Fields\SceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneField::code();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneField<mixed>
     */
    public static function details(): Fields\SceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneField::details();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneField<mixed>
     */
    public static function director(): Fields\SceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneField::director();
    }

    /**
     * @deprecated Use urls
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneField<mixed>
     */
    public static function url(): Fields\SceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneField::url();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneField<mixed>
     */
    public static function urls(): Fields\SceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneField::urls();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneField<mixed>
     */
    public static function date(): Fields\SceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneField::date();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneField<mixed>
     */
    public static function rating100(): Fields\SceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneField::rating100();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneField<mixed>
     */
    public static function organized(): Fields\SceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneField::organized();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneField<mixed>
     */
    public static function o_counter(): Fields\SceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneField::o_counter();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneField<mixed>
     */
    public static function interactive(): Fields\SceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneField::interactive();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneField<mixed>
     */
    public static function interactive_speed(): Fields\SceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneField::interactive_speed();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneField<\Tests\Feature\Fixture\Stash\SelectionSet\VideoCaptionSelectionSet>
     */
    public static function captions(): Fields\SceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneField::captions();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneField<mixed>
     */
    public static function created_at(): Fields\SceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneField::created_at();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneField<mixed>
     */
    public static function updated_at(): Fields\SceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneField::updated_at();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneField<mixed>
     */
    public static function last_played_at(): Fields\SceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneField::last_played_at();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneField<mixed>
     */
    public static function resume_time(): Fields\SceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneField::resume_time();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneField<mixed>
     */
    public static function play_duration(): Fields\SceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneField::play_duration();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneField<mixed>
     */
    public static function play_count(): Fields\SceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneField::play_count();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneField<mixed>
     */
    public static function play_history(): Fields\SceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneField::play_history();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneField<mixed>
     */
    public static function o_history(): Fields\SceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneField::o_history();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneField<\Tests\Feature\Fixture\Stash\SelectionSet\VideoFileSelectionSet>
     */
    public static function files(): Fields\SceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneField::files();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneField<\Tests\Feature\Fixture\Stash\SelectionSet\ScenePathsTypeSelectionSet>
     */
    public static function paths(): Fields\SceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneField::paths();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneField<\Tests\Feature\Fixture\Stash\SelectionSet\SceneMarkerSelectionSet>
     */
    public static function scene_markers(): Fields\SceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneField::scene_markers();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneField<\Tests\Feature\Fixture\Stash\SelectionSet\GallerySelectionSet>
     */
    public static function galleries(): Fields\SceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneField::galleries();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneField<\Tests\Feature\Fixture\Stash\SelectionSet\StudioSelectionSet>
     */
    public static function studio(): Fields\SceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneField::studio();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneField<\Tests\Feature\Fixture\Stash\SelectionSet\SceneGroupSelectionSet>
     */
    public static function groups(): Fields\SceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneField::groups();
    }

    /**
     * @deprecated Use groups
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneField<\Tests\Feature\Fixture\Stash\SelectionSet\SceneMovieSelectionSet>
     */
    public static function movies(): Fields\SceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneField::movies();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneField<\Tests\Feature\Fixture\Stash\SelectionSet\TagSelectionSet>
     */
    public static function tags(): Fields\SceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneField::tags();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneField<\Tests\Feature\Fixture\Stash\SelectionSet\PerformerSelectionSet>
     */
    public static function performers(): Fields\SceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneField::performers();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneField<\Tests\Feature\Fixture\Stash\SelectionSet\StashIDSelectionSet>
     */
    public static function stash_ids(): Fields\SceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneField::stash_ids();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneField<mixed>
     */
    public static function custom_fields(): Fields\SceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneField::custom_fields();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneField<\Tests\Feature\Fixture\Stash\SelectionSet\SceneStreamEndpointSelectionSet>
     */
    public static function sceneStreams(): Fields\SceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneField::sceneStreams();
    }

    /**
     * @param array<string> $urls
     * @param array<\DateTimeInterface> $play_history
     * @param array<\DateTimeInterface> $o_history
     * @param array<\Tests\Feature\Fixture\Stash\VideoFile> $files
     * @param array<\Tests\Feature\Fixture\Stash\SceneMarker> $scene_markers
     * @param array<\Tests\Feature\Fixture\Stash\Gallery> $galleries
     * @param array<\Tests\Feature\Fixture\Stash\SceneGroup> $groups
     * @param array<\Tests\Feature\Fixture\Stash\SceneMovie> $movies
     * @param array<\Tests\Feature\Fixture\Stash\Tag> $tags
     * @param array<\Tests\Feature\Fixture\Stash\Performer> $performers
     * @param array<\Tests\Feature\Fixture\Stash\StashID> $stash_ids
     * @param array<\Tests\Feature\Fixture\Stash\SceneStreamEndpoint> $sceneStreams
     * @param array<\Tests\Feature\Fixture\Stash\VideoCaption> $captions
     */
    public static function new(
        string $id,
        array $urls,
        bool $organized,
        bool $interactive,
        \DateTimeInterface $created_at,
        \DateTimeInterface $updated_at,
        array $play_history,
        array $o_history,
        array $files,
        ScenePathsType $paths,
        array $scene_markers,
        array $galleries,
        array $groups,
        array $movies,
        array $tags,
        array $performers,
        array $stash_ids,
        mixed $custom_fields,
        array $sceneStreams,
        ?string $title = null,
        ?string $code = null,
        ?string $details = null,
        ?string $director = null,
        ?string $url = null,
        ?string $date = null,
        ?int $rating100 = null,
        ?int $o_counter = null,
        ?int $interactive_speed = null,
        ?array $captions = null,
        ?\DateTimeInterface $last_played_at = null,
        ?float $resume_time = null,
        ?float $play_duration = null,
        ?int $play_count = null,
        ?Studio $studio = null,
    ): self {
        $self = new self();
        $self->id = $id;
        $self->urls = $urls;
        $self->organized = $organized;
        $self->interactive = $interactive;
        $self->created_at = $created_at;
        $self->updated_at = $updated_at;
        $self->play_history = $play_history;
        $self->o_history = $o_history;
        $self->files = $files;
        $self->paths = $paths;
        $self->scene_markers = $scene_markers;
        $self->galleries = $galleries;
        $self->groups = $groups;
        $self->movies = $movies;
        $self->tags = $tags;
        $self->performers = $performers;
        $self->stash_ids = $stash_ids;
        $self->custom_fields = $custom_fields;
        $self->sceneStreams = $sceneStreams;
        $self->title = $title;
        $self->code = $code;
        $self->details = $details;
        $self->director = $director;
        $self->url = $url;
        $self->date = $date;
        $self->rating100 = $rating100;
        $self->o_counter = $o_counter;
        $self->interactive_speed = $interactive_speed;
        $self->captions = $captions;
        $self->last_played_at = $last_played_at;
        $self->resume_time = $resume_time;
        $self->play_duration = $play_duration;
        $self->play_count = $play_count;
        $self->studio = $studio;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('id', $data)) {
            $self->id = $data['id'];
        }
        if (array_key_exists('urls', $data)) {
            $self->urls = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['urls'] ?? []);
        }
        if (array_key_exists('organized', $data)) {
            $self->organized = $data['organized'];
        }
        if (array_key_exists('interactive', $data)) {
            $self->interactive = $data['interactive'];
        }
        if (array_key_exists('created_at', $data)) {
            $self->created_at = new \DateTimeImmutable($data['created_at']);
        }
        if (array_key_exists('updated_at', $data)) {
            $self->updated_at = new \DateTimeImmutable($data['updated_at']);
        }
        if (array_key_exists('play_history', $data)) {
            $self->play_history = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return new \DateTimeImmutable($data);
            }, $data['play_history'] ?? []);
        }
        if (array_key_exists('o_history', $data)) {
            $self->o_history = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return new \DateTimeImmutable($data);
            }, $data['o_history'] ?? []);
        }
        if (array_key_exists('files', $data)) {
            $self->files = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\VideoFile::fromArray($data);
            }, $data['files'] ?? []);
        }
        if (array_key_exists('paths', $data)) {
            $self->paths = \Tests\Feature\Fixture\Stash\ScenePathsType::fromArray($data['paths']);
        }
        if (array_key_exists('scene_markers', $data)) {
            $self->scene_markers = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\SceneMarker::fromArray($data);
            }, $data['scene_markers'] ?? []);
        }
        if (array_key_exists('galleries', $data)) {
            $self->galleries = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\Gallery::fromArray($data);
            }, $data['galleries'] ?? []);
        }
        if (array_key_exists('groups', $data)) {
            $self->groups = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\SceneGroup::fromArray($data);
            }, $data['groups'] ?? []);
        }
        if (array_key_exists('movies', $data)) {
            $self->movies = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\SceneMovie::fromArray($data);
            }, $data['movies'] ?? []);
        }
        if (array_key_exists('tags', $data)) {
            $self->tags = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\Tag::fromArray($data);
            }, $data['tags'] ?? []);
        }
        if (array_key_exists('performers', $data)) {
            $self->performers = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\Performer::fromArray($data);
            }, $data['performers'] ?? []);
        }
        if (array_key_exists('stash_ids', $data)) {
            $self->stash_ids = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\StashID::fromArray($data);
            }, $data['stash_ids'] ?? []);
        }
        if (array_key_exists('custom_fields', $data)) {
            $self->custom_fields = $data['custom_fields'];
        }
        if (array_key_exists('sceneStreams', $data)) {
            $self->sceneStreams = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\SceneStreamEndpoint::fromArray($data);
            }, $data['sceneStreams'] ?? []);
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
        if (array_key_exists('date', $data)) {
            $self->date = $data['date'];
        }
        if (array_key_exists('rating100', $data)) {
            $self->rating100 = $data['rating100'];
        }
        if (array_key_exists('o_counter', $data)) {
            $self->o_counter = $data['o_counter'];
        }
        if (array_key_exists('interactive_speed', $data)) {
            $self->interactive_speed = $data['interactive_speed'];
        }
        if (array_key_exists('captions', $data)) {
            $self->captions = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\VideoCaption::fromArray($data);
            }, $data['captions'] ?? []);
        }
        if (array_key_exists('last_played_at', $data)) {
            $self->last_played_at = new \DateTimeImmutable($data['last_played_at']);
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
        if (array_key_exists('studio', $data)) {
            $self->studio = \Tests\Feature\Fixture\Stash\Studio::fromArray($data['studio']);
        }

        return $self;
    }
}
