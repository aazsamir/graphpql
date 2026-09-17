<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class SceneParserResult implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public Scene $scene;
    public ?string $title;
    public ?string $code;
    public ?string $details;
    public ?string $director;
    public ?string $url;
    public ?string $date;
    public ?int $rating;
    public ?int $rating100;
    public ?string $studio_id;

    /** @var array<string> */
    public ?array $gallery_ids;

    /** @var array<string> */
    public ?array $performer_ids;

    /** @var array<\Tests\Feature\Fixture\Stash\SceneMovieID> */
    public ?array $movies;

    /** @var array<string> */
    public ?array $tag_ids;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneParserResultField<\Tests\Feature\Fixture\Stash\SelectionSet\SceneSelectionSet>
     */
    public static function scene(): Fields\SceneParserResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneParserResultField::scene();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneParserResultField<mixed>
     */
    public static function title(): Fields\SceneParserResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneParserResultField::title();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneParserResultField<mixed>
     */
    public static function code(): Fields\SceneParserResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneParserResultField::code();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneParserResultField<mixed>
     */
    public static function details(): Fields\SceneParserResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneParserResultField::details();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneParserResultField<mixed>
     */
    public static function director(): Fields\SceneParserResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneParserResultField::director();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneParserResultField<mixed>
     */
    public static function url(): Fields\SceneParserResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneParserResultField::url();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneParserResultField<mixed>
     */
    public static function date(): Fields\SceneParserResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneParserResultField::date();
    }

    /**
     * @deprecated Use 1-100 range with rating100
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneParserResultField<mixed>
     */
    public static function rating(): Fields\SceneParserResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneParserResultField::rating();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneParserResultField<mixed>
     */
    public static function rating100(): Fields\SceneParserResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneParserResultField::rating100();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneParserResultField<mixed>
     */
    public static function studio_id(): Fields\SceneParserResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneParserResultField::studio_id();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneParserResultField<mixed>
     */
    public static function gallery_ids(): Fields\SceneParserResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneParserResultField::gallery_ids();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneParserResultField<mixed>
     */
    public static function performer_ids(): Fields\SceneParserResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneParserResultField::performer_ids();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneParserResultField<\Tests\Feature\Fixture\Stash\SelectionSet\SceneMovieIDSelectionSet>
     */
    public static function movies(): Fields\SceneParserResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneParserResultField::movies();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneParserResultField<mixed>
     */
    public static function tag_ids(): Fields\SceneParserResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneParserResultField::tag_ids();
    }

    /**
     * @param array<string> $gallery_ids
     * @param array<string> $performer_ids
     * @param array<\Tests\Feature\Fixture\Stash\SceneMovieID> $movies
     * @param array<string> $tag_ids
     */
    public static function new(
        Scene $scene,
        ?string $title = null,
        ?string $code = null,
        ?string $details = null,
        ?string $director = null,
        ?string $url = null,
        ?string $date = null,
        ?int $rating = null,
        ?int $rating100 = null,
        ?string $studio_id = null,
        ?array $gallery_ids = null,
        ?array $performer_ids = null,
        ?array $movies = null,
        ?array $tag_ids = null,
    ): self {
        $self = new self();
        $self->scene = $scene;
        $self->title = $title;
        $self->code = $code;
        $self->details = $details;
        $self->director = $director;
        $self->url = $url;
        $self->date = $date;
        $self->rating = $rating;
        $self->rating100 = $rating100;
        $self->studio_id = $studio_id;
        $self->gallery_ids = $gallery_ids;
        $self->performer_ids = $performer_ids;
        $self->movies = $movies;
        $self->tag_ids = $tag_ids;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('scene', $data)) {
            $self->scene = \Tests\Feature\Fixture\Stash\Scene::fromArray($data['scene']);
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
        if (array_key_exists('rating', $data)) {
            $self->rating = $data['rating'];
        }
        if (array_key_exists('rating100', $data)) {
            $self->rating100 = $data['rating100'];
        }
        if (array_key_exists('studio_id', $data)) {
            $self->studio_id = $data['studio_id'];
        }
        if (array_key_exists('gallery_ids', $data)) {
            $self->gallery_ids = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['gallery_ids'] ?? []);
        }
        if (array_key_exists('performer_ids', $data)) {
            $self->performer_ids = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['performer_ids'] ?? []);
        }
        if (array_key_exists('movies', $data)) {
            $self->movies = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\SceneMovieID::fromArray($data);
            }, $data['movies'] ?? []);
        }
        if (array_key_exists('tag_ids', $data)) {
            $self->tag_ids = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['tag_ids'] ?? []);
        }

        return $self;
    }
}
