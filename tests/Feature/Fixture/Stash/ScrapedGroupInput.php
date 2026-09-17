<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ScrapedGroupInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?string $name;
    public ?string $aliases;
    public ?string $duration;
    public ?string $date;
    public ?string $rating;
    public ?string $director;

    /** @var array<string> */
    public ?array $urls;
    public ?string $synopsis;

    /**
     * @param array<string> $urls
     */
    public static function new(
        ?string $name = null,
        ?string $aliases = null,
        ?string $duration = null,
        ?string $date = null,
        ?string $rating = null,
        ?string $director = null,
        ?array $urls = null,
        ?string $synopsis = null,
    ): self {
        $self = new self();
        $self->name = $name;
        $self->aliases = $aliases;
        $self->duration = $duration;
        $self->date = $date;
        $self->rating = $rating;
        $self->director = $director;
        $self->urls = $urls;
        $self->synopsis = $synopsis;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('name', $data)) {
            $self->name = $data['name'];
        }
        if (array_key_exists('aliases', $data)) {
            $self->aliases = $data['aliases'];
        }
        if (array_key_exists('duration', $data)) {
            $self->duration = $data['duration'];
        }
        if (array_key_exists('date', $data)) {
            $self->date = $data['date'];
        }
        if (array_key_exists('rating', $data)) {
            $self->rating = $data['rating'];
        }
        if (array_key_exists('director', $data)) {
            $self->director = $data['director'];
        }
        if (array_key_exists('urls', $data)) {
            $self->urls = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['urls'] ?? []);
        }
        if (array_key_exists('synopsis', $data)) {
            $self->synopsis = $data['synopsis'];
        }

        return $self;
    }
}
