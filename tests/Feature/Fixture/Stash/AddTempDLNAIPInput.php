<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class AddTempDLNAIPInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $address;
    public ?int $duration;

    public static function new(string $address, ?int $duration = null): self
    {
        $self = new self();
        $self->address = $address;
        $self->duration = $duration;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('address', $data)) {
            $self->address = $data['address'];
        }
        if (array_key_exists('duration', $data)) {
            $self->duration = $data['duration'];
        }

        return $self;
    }
}
