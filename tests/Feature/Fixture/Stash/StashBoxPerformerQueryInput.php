<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class StashBoxPerformerQueryInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?int $stash_box_index;
    public ?string $stash_box_endpoint;

    /** @var array<string> */
    public ?array $performer_ids;
    public ?string $q;

    /**
     * @param array<string> $performer_ids
     */
    public static function new(
        ?int $stash_box_index = null,
        ?string $stash_box_endpoint = null,
        ?array $performer_ids = null,
        ?string $q = null,
    ): self {
        $self = new self();
        $self->stash_box_index = $stash_box_index;
        $self->stash_box_endpoint = $stash_box_endpoint;
        $self->performer_ids = $performer_ids;
        $self->q = $q;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('stash_box_index', $data)) {
            $self->stash_box_index = $data['stash_box_index'];
        }
        if (array_key_exists('stash_box_endpoint', $data)) {
            $self->stash_box_endpoint = $data['stash_box_endpoint'];
        }
        if (array_key_exists('performer_ids', $data)) {
            $self->performer_ids = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['performer_ids'] ?? []);
        }
        if (array_key_exists('q', $data)) {
            $self->q = $data['q'];
        }

        return $self;
    }
}
