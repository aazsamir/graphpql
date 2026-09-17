<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class SceneMarkerCreateInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $title;
    public float $seconds;
    public ?float $end_seconds;
    public string $scene_id;
    public string $primary_tag_id;

    /** @var array<string> */
    public ?array $tag_ids;

    /**
     * @param array<string> $tag_ids
     */
    public static function new(
        string $title,
        float $seconds,
        string $scene_id,
        string $primary_tag_id,
        ?float $end_seconds = null,
        ?array $tag_ids = null,
    ): self {
        $self = new self();
        $self->title = $title;
        $self->seconds = $seconds;
        $self->scene_id = $scene_id;
        $self->primary_tag_id = $primary_tag_id;
        $self->end_seconds = $end_seconds;
        $self->tag_ids = $tag_ids;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('title', $data)) {
            $self->title = $data['title'];
        }
        if (array_key_exists('seconds', $data)) {
            $self->seconds = $data['seconds'];
        }
        if (array_key_exists('scene_id', $data)) {
            $self->scene_id = $data['scene_id'];
        }
        if (array_key_exists('primary_tag_id', $data)) {
            $self->primary_tag_id = $data['primary_tag_id'];
        }
        if (array_key_exists('end_seconds', $data)) {
            $self->end_seconds = $data['end_seconds'];
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
