<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class SceneMarker implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $id;
    public Scene $scene;
    public string $title;
    public float $seconds;
    public ?float $end_seconds;
    public Tag $primary_tag;

    /** @var array<\Tests\Feature\Fixture\Stash\Tag> */
    public array $tags;
    public \DateTimeInterface $created_at;
    public \DateTimeInterface $updated_at;
    public string $stream;
    public string $preview;
    public string $screenshot;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneMarkerField<mixed>
     */
    public static function id(): Fields\SceneMarkerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneMarkerField::id();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneMarkerField<\Tests\Feature\Fixture\Stash\SelectionSet\SceneSelectionSet>
     */
    public static function scene(): Fields\SceneMarkerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneMarkerField::scene();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneMarkerField<mixed>
     */
    public static function title(): Fields\SceneMarkerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneMarkerField::title();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneMarkerField<mixed>
     */
    public static function seconds(): Fields\SceneMarkerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneMarkerField::seconds();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneMarkerField<mixed>
     */
    public static function end_seconds(): Fields\SceneMarkerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneMarkerField::end_seconds();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneMarkerField<\Tests\Feature\Fixture\Stash\SelectionSet\TagSelectionSet>
     */
    public static function primary_tag(): Fields\SceneMarkerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneMarkerField::primary_tag();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneMarkerField<\Tests\Feature\Fixture\Stash\SelectionSet\TagSelectionSet>
     */
    public static function tags(): Fields\SceneMarkerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneMarkerField::tags();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneMarkerField<mixed>
     */
    public static function created_at(): Fields\SceneMarkerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneMarkerField::created_at();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneMarkerField<mixed>
     */
    public static function updated_at(): Fields\SceneMarkerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneMarkerField::updated_at();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneMarkerField<mixed>
     */
    public static function stream(): Fields\SceneMarkerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneMarkerField::stream();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneMarkerField<mixed>
     */
    public static function preview(): Fields\SceneMarkerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneMarkerField::preview();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneMarkerField<mixed>
     */
    public static function screenshot(): Fields\SceneMarkerField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneMarkerField::screenshot();
    }

    /**
     * @param array<\Tests\Feature\Fixture\Stash\Tag> $tags
     */
    public static function new(
        string $id,
        Scene $scene,
        string $title,
        float $seconds,
        Tag $primary_tag,
        array $tags,
        \DateTimeInterface $created_at,
        \DateTimeInterface $updated_at,
        string $stream,
        string $preview,
        string $screenshot,
        ?float $end_seconds = null,
    ): self {
        $self = new self();
        $self->id = $id;
        $self->scene = $scene;
        $self->title = $title;
        $self->seconds = $seconds;
        $self->primary_tag = $primary_tag;
        $self->tags = $tags;
        $self->created_at = $created_at;
        $self->updated_at = $updated_at;
        $self->stream = $stream;
        $self->preview = $preview;
        $self->screenshot = $screenshot;
        $self->end_seconds = $end_seconds;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('id', $data)) {
            $self->id = $data['id'];
        }
        if (array_key_exists('scene', $data)) {
            $self->scene = \Tests\Feature\Fixture\Stash\Scene::fromArray($data['scene']);
        }
        if (array_key_exists('title', $data)) {
            $self->title = $data['title'];
        }
        if (array_key_exists('seconds', $data)) {
            $self->seconds = $data['seconds'];
        }
        if (array_key_exists('primary_tag', $data)) {
            $self->primary_tag = \Tests\Feature\Fixture\Stash\Tag::fromArray($data['primary_tag']);
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
        if (array_key_exists('stream', $data)) {
            $self->stream = $data['stream'];
        }
        if (array_key_exists('preview', $data)) {
            $self->preview = $data['preview'];
        }
        if (array_key_exists('screenshot', $data)) {
            $self->screenshot = $data['screenshot'];
        }
        if (array_key_exists('end_seconds', $data)) {
            $self->end_seconds = $data['end_seconds'];
        }

        return $self;
    }
}
