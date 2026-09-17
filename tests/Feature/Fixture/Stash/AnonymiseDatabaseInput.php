<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class AnonymiseDatabaseInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?bool $download;

    public static function new(?bool $download = null): self
    {
        $self = new self();
        $self->download = $download;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('download', $data)) {
            $self->download = $data['download'];
        }

        return $self;
    }
}
