<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class FindGalleryChaptersResultType implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public int $count;

    /** @var array<\Tests\Feature\Fixture\Stash\GalleryChapter> */
    public array $chapters;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\FindGalleryChaptersResultTypeField<mixed>
     */
    public static function count(): Fields\FindGalleryChaptersResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\FindGalleryChaptersResultTypeField::count();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\FindGalleryChaptersResultTypeField<\Tests\Feature\Fixture\Stash\SelectionSet\GalleryChapterSelectionSet>
     */
    public static function chapters(): Fields\FindGalleryChaptersResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\FindGalleryChaptersResultTypeField::chapters();
    }

    /**
     * @param array<\Tests\Feature\Fixture\Stash\GalleryChapter> $chapters
     */
    public static function new(int $count, array $chapters): self
    {
        $self = new self();
        $self->count = $count;
        $self->chapters = $chapters;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('count', $data)) {
            $self->count = $data['count'];
        }
        if (array_key_exists('chapters', $data)) {
            $self->chapters = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\GalleryChapter::fromArray($data);
            }, $data['chapters'] ?? []);
        }

        return $self;
    }
}
