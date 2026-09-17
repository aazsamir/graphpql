<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ScrapeSingleSceneInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?string $query;
    public ?string $scene_id;
    public ?ScrapedSceneInput $scene_input;

    public static function new(
        ?string $query = null,
        ?string $scene_id = null,
        ?ScrapedSceneInput $scene_input = null,
    ): self {
        $self = new self();
        $self->query = $query;
        $self->scene_id = $scene_id;
        $self->scene_input = $scene_input;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('query', $data)) {
            $self->query = $data['query'];
        }
        if (array_key_exists('scene_id', $data)) {
            $self->scene_id = $data['scene_id'];
        }
        if (array_key_exists('scene_input', $data)) {
            $self->scene_input = \Tests\Feature\Fixture\Stash\ScrapedSceneInput::fromArray($data['scene_input']);
        }

        return $self;
    }
}
