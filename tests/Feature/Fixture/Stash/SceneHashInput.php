<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class SceneHashInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?string $checksum;
    public ?string $oshash;

    public static function new(?string $checksum = null, ?string $oshash = null): self
    {
        $self = new self();
        $self->checksum = $checksum;
        $self->oshash = $oshash;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('checksum', $data)) {
            $self->checksum = $data['checksum'];
        }
        if (array_key_exists('oshash', $data)) {
            $self->oshash = $data['oshash'];
        }

        return $self;
    }
}
