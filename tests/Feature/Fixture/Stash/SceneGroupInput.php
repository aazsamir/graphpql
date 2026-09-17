<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class SceneGroupInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $group_id;
    public ?int $scene_index;

    public static function new(string $group_id, ?int $scene_index = null): self
    {
        $self = new self();
        $self->group_id = $group_id;
        $self->scene_index = $scene_index;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('group_id', $data)) {
            $self->group_id = $data['group_id'];
        }
        if (array_key_exists('scene_index', $data)) {
            $self->scene_index = $data['scene_index'];
        }

        return $self;
    }
}
