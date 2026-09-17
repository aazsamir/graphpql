<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class SceneMovieInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $movie_id;
    public ?int $scene_index;

    public static function new(string $movie_id, ?int $scene_index = null): self
    {
        $self = new self();
        $self->movie_id = $movie_id;
        $self->scene_index = $scene_index;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('movie_id', $data)) {
            $self->movie_id = $data['movie_id'];
        }
        if (array_key_exists('scene_index', $data)) {
            $self->scene_index = $data['scene_index'];
        }

        return $self;
    }
}
