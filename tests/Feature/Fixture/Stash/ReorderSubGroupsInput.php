<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ReorderSubGroupsInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $group_id;

    /** @var array<string> */
    public array $sub_group_ids;
    public string $insert_at_id;
    public ?bool $insert_after;

    /**
     * @param array<string> $sub_group_ids
     */
    public static function new(
        string $group_id,
        array $sub_group_ids,
        string $insert_at_id,
        ?bool $insert_after = null,
    ): self {
        $self = new self();
        $self->group_id = $group_id;
        $self->sub_group_ids = $sub_group_ids;
        $self->insert_at_id = $insert_at_id;
        $self->insert_after = $insert_after;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('group_id', $data)) {
            $self->group_id = $data['group_id'];
        }
        if (array_key_exists('sub_group_ids', $data)) {
            $self->sub_group_ids = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['sub_group_ids'] ?? []);
        }
        if (array_key_exists('insert_at_id', $data)) {
            $self->insert_at_id = $data['insert_at_id'];
        }
        if (array_key_exists('insert_after', $data)) {
            $self->insert_after = $data['insert_after'];
        }

        return $self;
    }
}
