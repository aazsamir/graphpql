<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class GroupSubGroupRemoveInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $containing_group_id;

    /** @var array<string> */
    public array $sub_group_ids;

    /**
     * @param array<string> $sub_group_ids
     */
    public static function new(string $containing_group_id, array $sub_group_ids): self
    {
        $self = new self();
        $self->containing_group_id = $containing_group_id;
        $self->sub_group_ids = $sub_group_ids;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('containing_group_id', $data)) {
            $self->containing_group_id = $data['containing_group_id'];
        }
        if (array_key_exists('sub_group_ids', $data)) {
            $self->sub_group_ids = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['sub_group_ids'] ?? []);
        }

        return $self;
    }
}
