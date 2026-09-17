<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ScrapeSingleImageInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?string $query;
    public ?string $image_id;
    public ?ScrapedImageInput $image_input;

    public static function new(
        ?string $query = null,
        ?string $image_id = null,
        ?ScrapedImageInput $image_input = null,
    ): self {
        $self = new self();
        $self->query = $query;
        $self->image_id = $image_id;
        $self->image_input = $image_input;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('query', $data)) {
            $self->query = $data['query'];
        }
        if (array_key_exists('image_id', $data)) {
            $self->image_id = $data['image_id'];
        }
        if (array_key_exists('image_input', $data)) {
            $self->image_input = \Tests\Feature\Fixture\Stash\ScrapedImageInput::fromArray($data['image_input']);
        }

        return $self;
    }
}
