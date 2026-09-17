<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class FindGalleriesResultType implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public int $count;

    /** @var array<\Tests\Feature\Fixture\Stash\Gallery> */
    public array $galleries;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\FindGalleriesResultTypeField<mixed>
     */
    public static function count(): Fields\FindGalleriesResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\FindGalleriesResultTypeField::count();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\FindGalleriesResultTypeField<\Tests\Feature\Fixture\Stash\SelectionSet\GallerySelectionSet>
     */
    public static function galleries(): Fields\FindGalleriesResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\FindGalleriesResultTypeField::galleries();
    }

    /**
     * @param array<\Tests\Feature\Fixture\Stash\Gallery> $galleries
     */
    public static function new(int $count, array $galleries): self
    {
        $self = new self();
        $self->count = $count;
        $self->galleries = $galleries;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('count', $data)) {
            $self->count = $data['count'];
        }
        if (array_key_exists('galleries', $data)) {
            $self->galleries = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\Gallery::fromArray($data);
            }, $data['galleries'] ?? []);
        }

        return $self;
    }
}
