<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class MarkerStringsResultType implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public int $count;
    public string $id;
    public string $title;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\MarkerStringsResultTypeField<mixed>
     */
    public static function count(): Fields\MarkerStringsResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\MarkerStringsResultTypeField::count();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\MarkerStringsResultTypeField<mixed>
     */
    public static function id(): Fields\MarkerStringsResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\MarkerStringsResultTypeField::id();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\MarkerStringsResultTypeField<mixed>
     */
    public static function title(): Fields\MarkerStringsResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\MarkerStringsResultTypeField::title();
    }

    public static function new(int $count, string $id, string $title): self
    {
        $self = new self();
        $self->count = $count;
        $self->id = $id;
        $self->title = $title;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('count', $data)) {
            $self->count = $data['count'];
        }
        if (array_key_exists('id', $data)) {
            $self->id = $data['id'];
        }
        if (array_key_exists('title', $data)) {
            $self->title = $data['title'];
        }

        return $self;
    }
}
