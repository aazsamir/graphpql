<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class GroupSubGroupAddInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $containing_group_id;

    /** @var array<\Tests\Feature\Fixture\Stash\GroupDescriptionInput> */
    public array $sub_groups;
    public ?int $insert_index;

    /**
     * @param array<\Tests\Feature\Fixture\Stash\GroupDescriptionInput> $sub_groups
     */
    public static function new(string $containing_group_id, array $sub_groups, ?int $insert_index = null): self
    {
        $self = new self();
        $self->containing_group_id = $containing_group_id;
        $self->sub_groups = $sub_groups;
        $self->insert_index = $insert_index;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('containing_group_id', $data)) {
            $self->containing_group_id = $data['containing_group_id'];
        }
        if (array_key_exists('sub_groups', $data)) {
            $self->sub_groups = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\GroupDescriptionInput::fromArray($data);
            }, $data['sub_groups'] ?? []);
        }
        if (array_key_exists('insert_index', $data)) {
            $self->insert_index = $data['insert_index'];
        }

        return $self;
    }
}
