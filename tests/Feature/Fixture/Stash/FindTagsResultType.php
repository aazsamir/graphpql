<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class FindTagsResultType implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public int $count;

    /** @var array<\Tests\Feature\Fixture\Stash\Tag> */
    public array $tags;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\FindTagsResultTypeField<mixed>
     */
    public static function count(): Fields\FindTagsResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\FindTagsResultTypeField::count();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\FindTagsResultTypeField<\Tests\Feature\Fixture\Stash\SelectionSet\TagSelectionSet>
     */
    public static function tags(): Fields\FindTagsResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\FindTagsResultTypeField::tags();
    }

    /**
     * @param array<\Tests\Feature\Fixture\Stash\Tag> $tags
     */
    public static function new(int $count, array $tags): self
    {
        $self = new self();
        $self->count = $count;
        $self->tags = $tags;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('count', $data)) {
            $self->count = $data['count'];
        }
        if (array_key_exists('tags', $data)) {
            $self->tags = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\Tag::fromArray($data);
            }, $data['tags'] ?? []);
        }

        return $self;
    }
}
