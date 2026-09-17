<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class DestroyFilterInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $id;

    public static function new(string $id): self
    {
        $self = new self();
        $self->id = $id;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('id', $data)) {
            $self->id = $data['id'];
        }

        return $self;
    }
}
