<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class GalleryPathsType implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $cover;
    public string $preview;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryPathsTypeField<mixed>
     */
    public static function cover(): Fields\GalleryPathsTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryPathsTypeField::cover();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryPathsTypeField<mixed>
     */
    public static function preview(): Fields\GalleryPathsTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryPathsTypeField::preview();
    }

    public static function new(string $cover, string $preview): self
    {
        $self = new self();
        $self->cover = $cover;
        $self->preview = $preview;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('cover', $data)) {
            $self->cover = $data['cover'];
        }
        if (array_key_exists('preview', $data)) {
            $self->preview = $data['preview'];
        }

        return $self;
    }
}
