<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ScrapeSingleGalleryInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?string $query;
    public ?string $gallery_id;
    public ?ScrapedGalleryInput $gallery_input;

    public static function new(
        ?string $query = null,
        ?string $gallery_id = null,
        ?ScrapedGalleryInput $gallery_input = null,
    ): self {
        $self = new self();
        $self->query = $query;
        $self->gallery_id = $gallery_id;
        $self->gallery_input = $gallery_input;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('query', $data)) {
            $self->query = $data['query'];
        }
        if (array_key_exists('gallery_id', $data)) {
            $self->gallery_id = $data['gallery_id'];
        }
        if (array_key_exists('gallery_input', $data)) {
            $self->gallery_input = \Tests\Feature\Fixture\Stash\ScrapedGalleryInput::fromArray($data['gallery_input']);
        }

        return $self;
    }
}
