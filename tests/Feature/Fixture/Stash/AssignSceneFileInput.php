<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class AssignSceneFileInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $scene_id;
    public string $file_id;

    public static function new(string $scene_id, string $file_id): self
    {
        $self = new self();
        $self->scene_id = $scene_id;
        $self->file_id = $file_id;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('scene_id', $data)) {
            $self->scene_id = $data['scene_id'];
        }
        if (array_key_exists('file_id', $data)) {
            $self->file_id = $data['file_id'];
        }

        return $self;
    }
}
