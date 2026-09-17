<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class FindMoviesResultType implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public int $count;

    /** @var array<\Tests\Feature\Fixture\Stash\Movie> */
    public array $movies;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\FindMoviesResultTypeField<mixed>
     */
    public static function count(): Fields\FindMoviesResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\FindMoviesResultTypeField::count();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\FindMoviesResultTypeField<\Tests\Feature\Fixture\Stash\SelectionSet\MovieSelectionSet>
     */
    public static function movies(): Fields\FindMoviesResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\FindMoviesResultTypeField::movies();
    }

    /**
     * @param array<\Tests\Feature\Fixture\Stash\Movie> $movies
     */
    public static function new(int $count, array $movies): self
    {
        $self = new self();
        $self->count = $count;
        $self->movies = $movies;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('count', $data)) {
            $self->count = $data['count'];
        }
        if (array_key_exists('movies', $data)) {
            $self->movies = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\Movie::fromArray($data);
            }, $data['movies'] ?? []);
        }

        return $self;
    }
}
