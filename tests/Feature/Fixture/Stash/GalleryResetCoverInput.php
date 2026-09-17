<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class GalleryResetCoverInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $gallery_id;

    public static function new(string $gallery_id): self
    {
        $self = new self();
        $self->gallery_id = $gallery_id;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('gallery_id', $data)) {
            $self->gallery_id = $data['gallery_id'];
        }

        return $self;
    }
}
