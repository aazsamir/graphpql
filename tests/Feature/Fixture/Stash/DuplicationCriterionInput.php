<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class DuplicationCriterionInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?bool $duplicated;
    public ?int $distance;
    public ?bool $phash;
    public ?bool $url;
    public ?bool $stash_id;
    public ?bool $title;

    public static function new(
        ?bool $duplicated = null,
        ?int $distance = null,
        ?bool $phash = null,
        ?bool $url = null,
        ?bool $stash_id = null,
        ?bool $title = null,
    ): self {
        $self = new self();
        $self->duplicated = $duplicated;
        $self->distance = $distance;
        $self->phash = $phash;
        $self->url = $url;
        $self->stash_id = $stash_id;
        $self->title = $title;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('duplicated', $data)) {
            $self->duplicated = $data['duplicated'];
        }
        if (array_key_exists('distance', $data)) {
            $self->distance = $data['distance'];
        }
        if (array_key_exists('phash', $data)) {
            $self->phash = $data['phash'];
        }
        if (array_key_exists('url', $data)) {
            $self->url = $data['url'];
        }
        if (array_key_exists('stash_id', $data)) {
            $self->stash_id = $data['stash_id'];
        }
        if (array_key_exists('title', $data)) {
            $self->title = $data['title'];
        }

        return $self;
    }
}
