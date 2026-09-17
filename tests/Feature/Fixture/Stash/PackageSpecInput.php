<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class PackageSpecInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $id;
    public string $sourceURL;

    public static function new(string $id, string $sourceURL): self
    {
        $self = new self();
        $self->id = $id;
        $self->sourceURL = $sourceURL;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('id', $data)) {
            $self->id = $data['id'];
        }
        if (array_key_exists('sourceURL', $data)) {
            $self->sourceURL = $data['sourceURL'];
        }

        return $self;
    }
}
