<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class MigrateBlobsInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?bool $deleteOld;

    public static function new(?bool $deleteOld = null): self
    {
        $self = new self();
        $self->deleteOld = $deleteOld;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('deleteOld', $data)) {
            $self->deleteOld = $data['deleteOld'];
        }

        return $self;
    }
}
