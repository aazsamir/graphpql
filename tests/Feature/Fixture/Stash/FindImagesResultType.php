<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class FindImagesResultType implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public int $count;
    public float $megapixels;
    public float $filesize;

    /** @var array<\Tests\Feature\Fixture\Stash\Image> */
    public array $images;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\FindImagesResultTypeField<mixed>
     */
    public static function count(): Fields\FindImagesResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\FindImagesResultTypeField::count();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\FindImagesResultTypeField<mixed>
     */
    public static function megapixels(): Fields\FindImagesResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\FindImagesResultTypeField::megapixels();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\FindImagesResultTypeField<mixed>
     */
    public static function filesize(): Fields\FindImagesResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\FindImagesResultTypeField::filesize();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\FindImagesResultTypeField<\Tests\Feature\Fixture\Stash\SelectionSet\ImageSelectionSet>
     */
    public static function images(): Fields\FindImagesResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\FindImagesResultTypeField::images();
    }

    /**
     * @param array<\Tests\Feature\Fixture\Stash\Image> $images
     */
    public static function new(int $count, float $megapixels, float $filesize, array $images): self
    {
        $self = new self();
        $self->count = $count;
        $self->megapixels = $megapixels;
        $self->filesize = $filesize;
        $self->images = $images;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('count', $data)) {
            $self->count = $data['count'];
        }
        if (array_key_exists('megapixels', $data)) {
            $self->megapixels = $data['megapixels'];
        }
        if (array_key_exists('filesize', $data)) {
            $self->filesize = $data['filesize'];
        }
        if (array_key_exists('images', $data)) {
            $self->images = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\Image::fromArray($data);
            }, $data['images'] ?? []);
        }

        return $self;
    }
}
