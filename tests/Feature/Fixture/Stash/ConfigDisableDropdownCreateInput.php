<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ConfigDisableDropdownCreateInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?bool $performer;
    public ?bool $tag;
    public ?bool $studio;
    public ?bool $movie;
    public ?bool $gallery;

    public static function new(
        ?bool $performer = null,
        ?bool $tag = null,
        ?bool $studio = null,
        ?bool $movie = null,
        ?bool $gallery = null,
    ): self {
        $self = new self();
        $self->performer = $performer;
        $self->tag = $tag;
        $self->studio = $studio;
        $self->movie = $movie;
        $self->gallery = $gallery;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('performer', $data)) {
            $self->performer = $data['performer'];
        }
        if (array_key_exists('tag', $data)) {
            $self->tag = $data['tag'];
        }
        if (array_key_exists('studio', $data)) {
            $self->studio = $data['studio'];
        }
        if (array_key_exists('movie', $data)) {
            $self->movie = $data['movie'];
        }
        if (array_key_exists('gallery', $data)) {
            $self->gallery = $data['gallery'];
        }

        return $self;
    }
}
