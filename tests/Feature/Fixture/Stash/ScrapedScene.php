<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ScrapedScene implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?string $title;
    public ?string $code;
    public ?string $details;
    public ?string $director;
    public ?string $url;

    /** @var array<string> */
    public ?array $urls;
    public ?string $date;
    public ?string $image;
    public ?SceneFileType $file;
    public ?ScrapedStudio $studio;

    /** @var array<\Tests\Feature\Fixture\Stash\ScrapedTag> */
    public ?array $tags;

    /** @var array<\Tests\Feature\Fixture\Stash\ScrapedPerformer> */
    public ?array $performers;

    /** @var array<\Tests\Feature\Fixture\Stash\ScrapedMovie> */
    public ?array $movies;

    /** @var array<\Tests\Feature\Fixture\Stash\ScrapedGroup> */
    public ?array $groups;
    public ?string $remote_site_id;
    public ?int $duration;

    /** @var array<\Tests\Feature\Fixture\Stash\StashBoxFingerprint> */
    public ?array $fingerprints;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedSceneField<mixed>
     */
    public static function title(): Fields\ScrapedSceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedSceneField::title();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedSceneField<mixed>
     */
    public static function code(): Fields\ScrapedSceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedSceneField::code();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedSceneField<mixed>
     */
    public static function details(): Fields\ScrapedSceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedSceneField::details();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedSceneField<mixed>
     */
    public static function director(): Fields\ScrapedSceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedSceneField::director();
    }

    /**
     * @deprecated use urls
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedSceneField<mixed>
     */
    public static function url(): Fields\ScrapedSceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedSceneField::url();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedSceneField<mixed>
     */
    public static function urls(): Fields\ScrapedSceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedSceneField::urls();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedSceneField<mixed>
     */
    public static function date(): Fields\ScrapedSceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedSceneField::date();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedSceneField<mixed>
     */
    public static function image(): Fields\ScrapedSceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedSceneField::image();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedSceneField<\Tests\Feature\Fixture\Stash\SelectionSet\SceneFileTypeSelectionSet>
     */
    public static function file(): Fields\ScrapedSceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedSceneField::file();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedSceneField<\Tests\Feature\Fixture\Stash\SelectionSet\ScrapedStudioSelectionSet>
     */
    public static function studio(): Fields\ScrapedSceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedSceneField::studio();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedSceneField<\Tests\Feature\Fixture\Stash\SelectionSet\ScrapedTagSelectionSet>
     */
    public static function tags(): Fields\ScrapedSceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedSceneField::tags();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedSceneField<\Tests\Feature\Fixture\Stash\SelectionSet\ScrapedPerformerSelectionSet>
     */
    public static function performers(): Fields\ScrapedSceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedSceneField::performers();
    }

    /**
     * @deprecated use groups
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedSceneField<\Tests\Feature\Fixture\Stash\SelectionSet\ScrapedMovieSelectionSet>
     */
    public static function movies(): Fields\ScrapedSceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedSceneField::movies();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedSceneField<\Tests\Feature\Fixture\Stash\SelectionSet\ScrapedGroupSelectionSet>
     */
    public static function groups(): Fields\ScrapedSceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedSceneField::groups();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedSceneField<mixed>
     */
    public static function remote_site_id(): Fields\ScrapedSceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedSceneField::remote_site_id();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedSceneField<mixed>
     */
    public static function duration(): Fields\ScrapedSceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedSceneField::duration();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedSceneField<\Tests\Feature\Fixture\Stash\SelectionSet\StashBoxFingerprintSelectionSet>
     */
    public static function fingerprints(): Fields\ScrapedSceneField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedSceneField::fingerprints();
    }

    /**
     * @param array<string> $urls
     * @param array<\Tests\Feature\Fixture\Stash\ScrapedTag> $tags
     * @param array<\Tests\Feature\Fixture\Stash\ScrapedPerformer> $performers
     * @param array<\Tests\Feature\Fixture\Stash\ScrapedMovie> $movies
     * @param array<\Tests\Feature\Fixture\Stash\ScrapedGroup> $groups
     * @param array<\Tests\Feature\Fixture\Stash\StashBoxFingerprint> $fingerprints
     */
    public static function new(
        ?string $title = null,
        ?string $code = null,
        ?string $details = null,
        ?string $director = null,
        ?string $url = null,
        ?array $urls = null,
        ?string $date = null,
        ?string $image = null,
        ?SceneFileType $file = null,
        ?ScrapedStudio $studio = null,
        ?array $tags = null,
        ?array $performers = null,
        ?array $movies = null,
        ?array $groups = null,
        ?string $remote_site_id = null,
        ?int $duration = null,
        ?array $fingerprints = null,
    ): self {
        $self = new self();
        $self->title = $title;
        $self->code = $code;
        $self->details = $details;
        $self->director = $director;
        $self->url = $url;
        $self->urls = $urls;
        $self->date = $date;
        $self->image = $image;
        $self->file = $file;
        $self->studio = $studio;
        $self->tags = $tags;
        $self->performers = $performers;
        $self->movies = $movies;
        $self->groups = $groups;
        $self->remote_site_id = $remote_site_id;
        $self->duration = $duration;
        $self->fingerprints = $fingerprints;

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
        if (array_key_exists('image', $data)) {
            $self->image = $data['image'];
        }
        if (array_key_exists('file', $data)) {
            $self->file = \Tests\Feature\Fixture\Stash\SceneFileType::fromArray($data['file']);
        }
        if (array_key_exists('studio', $data)) {
            $self->studio = \Tests\Feature\Fixture\Stash\ScrapedStudio::fromArray($data['studio']);
        }
        if (array_key_exists('tags', $data)) {
            $self->tags = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\ScrapedTag::fromArray($data);
            }, $data['tags'] ?? []);
        }
        if (array_key_exists('performers', $data)) {
            $self->performers = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\ScrapedPerformer::fromArray($data);
            }, $data['performers'] ?? []);
        }
        if (array_key_exists('movies', $data)) {
            $self->movies = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\ScrapedMovie::fromArray($data);
            }, $data['movies'] ?? []);
        }
        if (array_key_exists('groups', $data)) {
            $self->groups = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\ScrapedGroup::fromArray($data);
            }, $data['groups'] ?? []);
        }
        if (array_key_exists('remote_site_id', $data)) {
            $self->remote_site_id = $data['remote_site_id'];
        }
        if (array_key_exists('duration', $data)) {
            $self->duration = $data['duration'];
        }
        if (array_key_exists('fingerprints', $data)) {
            $self->fingerprints = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\StashBoxFingerprint::fromArray($data);
            }, $data['fingerprints'] ?? []);
        }

        return $self;
    }
}
