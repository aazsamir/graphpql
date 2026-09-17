<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class GalleryChapterCreateInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $gallery_id;
    public string $title;
    public int $image_index;

    public static function new(string $gallery_id, string $title, int $image_index): self
    {
        $self = new self();
        $self->gallery_id = $gallery_id;
        $self->title = $title;
        $self->image_index = $image_index;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('gallery_id', $data)) {
            $self->gallery_id = $data['gallery_id'];
        }
        if (array_key_exists('title', $data)) {
            $self->title = $data['title'];
        }
        if (array_key_exists('image_index', $data)) {
            $self->image_index = $data['image_index'];
        }

        return $self;
    }
}
