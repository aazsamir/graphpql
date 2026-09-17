<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class BulkMovieUpdateInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?string $clientMutationId;

    /** @var array<string> */
    public ?array $ids;
    public ?int $rating100;
    public ?string $studio_id;
    public ?string $director;
    public ?BulkUpdateStrings $urls;
    public ?BulkUpdateIds $tag_ids;

    /**
     * @param array<string> $ids
     */
    public static function new(
        ?string $clientMutationId = null,
        ?array $ids = null,
        ?int $rating100 = null,
        ?string $studio_id = null,
        ?string $director = null,
        ?BulkUpdateStrings $urls = null,
        ?BulkUpdateIds $tag_ids = null,
    ): self {
        $self = new self();
        $self->clientMutationId = $clientMutationId;
        $self->ids = $ids;
        $self->rating100 = $rating100;
        $self->studio_id = $studio_id;
        $self->director = $director;
        $self->urls = $urls;
        $self->tag_ids = $tag_ids;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('clientMutationId', $data)) {
            $self->clientMutationId = $data['clientMutationId'];
        }
        if (array_key_exists('ids', $data)) {
            $self->ids = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['ids'] ?? []);
        }
        if (array_key_exists('rating100', $data)) {
            $self->rating100 = $data['rating100'];
        }
        if (array_key_exists('studio_id', $data)) {
            $self->studio_id = $data['studio_id'];
        }
        if (array_key_exists('director', $data)) {
            $self->director = $data['director'];
        }
        if (array_key_exists('urls', $data)) {
            $self->urls = \Tests\Feature\Fixture\Stash\BulkUpdateStrings::fromArray($data['urls']);
        }
        if (array_key_exists('tag_ids', $data)) {
            $self->tag_ids = \Tests\Feature\Fixture\Stash\BulkUpdateIds::fromArray($data['tag_ids']);
        }

        return $self;
    }
}
