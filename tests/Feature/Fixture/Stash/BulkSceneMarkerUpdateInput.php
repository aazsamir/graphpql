<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class BulkSceneMarkerUpdateInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    /** @var array<string> */
    public ?array $ids;
    public ?string $title;
    public ?string $primary_tag_id;
    public ?BulkUpdateIds $tag_ids;

    /**
     * @param array<string> $ids
     */
    public static function new(
        ?array $ids = null,
        ?string $title = null,
        ?string $primary_tag_id = null,
        ?BulkUpdateIds $tag_ids = null,
    ): self {
        $self = new self();
        $self->ids = $ids;
        $self->title = $title;
        $self->primary_tag_id = $primary_tag_id;
        $self->tag_ids = $tag_ids;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('ids', $data)) {
            $self->ids = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['ids'] ?? []);
        }
        if (array_key_exists('title', $data)) {
            $self->title = $data['title'];
        }
        if (array_key_exists('primary_tag_id', $data)) {
            $self->primary_tag_id = $data['primary_tag_id'];
        }
        if (array_key_exists('tag_ids', $data)) {
            $self->tag_ids = \Tests\Feature\Fixture\Stash\BulkUpdateIds::fromArray($data['tag_ids']);
        }

        return $self;
    }
}
