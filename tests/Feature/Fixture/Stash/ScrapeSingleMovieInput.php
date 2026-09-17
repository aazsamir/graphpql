<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ScrapeSingleMovieInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?string $query;
    public ?string $movie_id;
    public ?ScrapedMovieInput $movie_input;

    public static function new(
        ?string $query = null,
        ?string $movie_id = null,
        ?ScrapedMovieInput $movie_input = null,
    ): self {
        $self = new self();
        $self->query = $query;
        $self->movie_id = $movie_id;
        $self->movie_input = $movie_input;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('query', $data)) {
            $self->query = $data['query'];
        }
        if (array_key_exists('movie_id', $data)) {
            $self->movie_id = $data['movie_id'];
        }
        if (array_key_exists('movie_input', $data)) {
            $self->movie_input = \Tests\Feature\Fixture\Stash\ScrapedMovieInput::fromArray($data['movie_input']);
        }

        return $self;
    }
}
