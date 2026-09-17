<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class FileDuplicationCriterionInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?bool $duplicated;
    public ?int $distance;
    public ?bool $phash;

    public static function new(?bool $duplicated = null, ?int $distance = null, ?bool $phash = null): self
    {
        $self = new self();
        $self->duplicated = $duplicated;
        $self->distance = $distance;
        $self->phash = $phash;

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

        return $self;
    }
}
