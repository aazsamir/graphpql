<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class FindStudiosResultType implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public int $count;

    /** @var array<\Tests\Feature\Fixture\Stash\Studio> */
    public array $studios;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\FindStudiosResultTypeField<mixed>
     */
    public static function count(): Fields\FindStudiosResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\FindStudiosResultTypeField::count();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\FindStudiosResultTypeField<\Tests\Feature\Fixture\Stash\SelectionSet\StudioSelectionSet>
     */
    public static function studios(): Fields\FindStudiosResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\FindStudiosResultTypeField::studios();
    }

    /**
     * @param array<\Tests\Feature\Fixture\Stash\Studio> $studios
     */
    public static function new(int $count, array $studios): self
    {
        $self = new self();
        $self->count = $count;
        $self->studios = $studios;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('count', $data)) {
            $self->count = $data['count'];
        }
        if (array_key_exists('studios', $data)) {
            $self->studios = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\Studio::fromArray($data);
            }, $data['studios'] ?? []);
        }

        return $self;
    }
}
