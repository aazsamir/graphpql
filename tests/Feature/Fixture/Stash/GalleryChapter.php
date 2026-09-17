<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class GalleryChapter implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $id;
    public Gallery $gallery;
    public string $title;
    public int $image_index;
    public \DateTimeInterface $created_at;
    public \DateTimeInterface $updated_at;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryChapterField<mixed>
     */
    public static function id(): Fields\GalleryChapterField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryChapterField::id();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryChapterField<\Tests\Feature\Fixture\Stash\SelectionSet\GallerySelectionSet>
     */
    public static function gallery(): Fields\GalleryChapterField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryChapterField::gallery();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryChapterField<mixed>
     */
    public static function title(): Fields\GalleryChapterField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryChapterField::title();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryChapterField<mixed>
     */
    public static function image_index(): Fields\GalleryChapterField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryChapterField::image_index();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryChapterField<mixed>
     */
    public static function created_at(): Fields\GalleryChapterField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryChapterField::created_at();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryChapterField<mixed>
     */
    public static function updated_at(): Fields\GalleryChapterField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryChapterField::updated_at();
    }

    public static function new(
        string $id,
        Gallery $gallery,
        string $title,
        int $image_index,
        \DateTimeInterface $created_at,
        \DateTimeInterface $updated_at,
    ): self {
        $self = new self();
        $self->id = $id;
        $self->gallery = $gallery;
        $self->title = $title;
        $self->image_index = $image_index;
        $self->created_at = $created_at;
        $self->updated_at = $updated_at;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('id', $data)) {
            $self->id = $data['id'];
        }
        if (array_key_exists('gallery', $data)) {
            $self->gallery = \Tests\Feature\Fixture\Stash\Gallery::fromArray($data['gallery']);
        }
        if (array_key_exists('title', $data)) {
            $self->title = $data['title'];
        }
        if (array_key_exists('image_index', $data)) {
            $self->image_index = $data['image_index'];
        }
        if (array_key_exists('created_at', $data)) {
            $self->created_at = new \DateTimeImmutable($data['created_at']);
        }
        if (array_key_exists('updated_at', $data)) {
            $self->updated_at = new \DateTimeImmutable($data['updated_at']);
        }

        return $self;
    }
}
