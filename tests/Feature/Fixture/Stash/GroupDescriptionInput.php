<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class GroupDescriptionInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $group_id;
    public ?string $description;

    public static function new(string $group_id, ?string $description = null): self
    {
        $self = new self();
        $self->group_id = $group_id;
        $self->description = $description;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('group_id', $data)) {
            $self->group_id = $data['group_id'];
        }
        if (array_key_exists('description', $data)) {
            $self->description = $data['description'];
        }

        return $self;
    }
}
