<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class EnableDLNAInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?int $duration;

    public static function new(?int $duration = null): self
    {
        $self = new self();
        $self->duration = $duration;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('duration', $data)) {
            $self->duration = $data['duration'];
        }

        return $self;
    }
}
