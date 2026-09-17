<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class SceneMovie implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public Movie $movie;
    public ?int $scene_index;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneMovieField<\Tests\Feature\Fixture\Stash\SelectionSet\MovieSelectionSet>
     */
    public static function movie(): Fields\SceneMovieField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneMovieField::movie();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneMovieField<mixed>
     */
    public static function scene_index(): Fields\SceneMovieField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneMovieField::scene_index();
    }

    public static function new(Movie $movie, ?int $scene_index = null): self
    {
        $self = new self();
        $self->movie = $movie;
        $self->scene_index = $scene_index;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('movie', $data)) {
            $self->movie = \Tests\Feature\Fixture\Stash\Movie::fromArray($data['movie']);
        }
        if (array_key_exists('scene_index', $data)) {
            $self->scene_index = $data['scene_index'];
        }

        return $self;
    }
}
