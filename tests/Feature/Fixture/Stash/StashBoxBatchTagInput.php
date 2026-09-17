<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class StashBoxBatchTagInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?int $endpoint;
    public ?string $stash_box_endpoint;

    /** @var array<string> */
    public ?array $exclude_fields;
    public bool $refresh;
    public bool $createParent;

    /** @var array<string> */
    public ?array $ids;

    /** @var array<string> */
    public ?array $names;

    /** @var array<string> */
    public ?array $stash_ids;

    /** @var array<string> */
    public ?array $performer_ids;

    /** @var array<string> */
    public ?array $performer_names;

    /**
     * @param array<string> $exclude_fields
     * @param array<string> $ids
     * @param array<string> $names
     * @param array<string> $stash_ids
     * @param array<string> $performer_ids
     * @param array<string> $performer_names
     */
    public static function new(
        bool $refresh,
        bool $createParent,
        ?int $endpoint = null,
        ?string $stash_box_endpoint = null,
        ?array $exclude_fields = null,
        ?array $ids = null,
        ?array $names = null,
        ?array $stash_ids = null,
        ?array $performer_ids = null,
        ?array $performer_names = null,
    ): self {
        $self = new self();
        $self->refresh = $refresh;
        $self->createParent = $createParent;
        $self->endpoint = $endpoint;
        $self->stash_box_endpoint = $stash_box_endpoint;
        $self->exclude_fields = $exclude_fields;
        $self->ids = $ids;
        $self->names = $names;
        $self->stash_ids = $stash_ids;
        $self->performer_ids = $performer_ids;
        $self->performer_names = $performer_names;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('refresh', $data)) {
            $self->refresh = $data['refresh'];
        }
        if (array_key_exists('createParent', $data)) {
            $self->createParent = $data['createParent'];
        }
        if (array_key_exists('endpoint', $data)) {
            $self->endpoint = $data['endpoint'];
        }
        if (array_key_exists('stash_box_endpoint', $data)) {
            $self->stash_box_endpoint = $data['stash_box_endpoint'];
        }
        if (array_key_exists('exclude_fields', $data)) {
            $self->exclude_fields = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['exclude_fields'] ?? []);
        }
        if (array_key_exists('ids', $data)) {
            $self->ids = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['ids'] ?? []);
        }
        if (array_key_exists('names', $data)) {
            $self->names = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['names'] ?? []);
        }
        if (array_key_exists('stash_ids', $data)) {
            $self->stash_ids = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['stash_ids'] ?? []);
        }
        if (array_key_exists('performer_ids', $data)) {
            $self->performer_ids = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['performer_ids'] ?? []);
        }
        if (array_key_exists('performer_names', $data)) {
            $self->performer_names = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['performer_names'] ?? []);
        }

        return $self;
    }
}
