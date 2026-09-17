<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class FindPerformersResultType implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public int $count;

    /** @var array<\Tests\Feature\Fixture\Stash\Performer> */
    public array $performers;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\FindPerformersResultTypeField<mixed>
     */
    public static function count(): Fields\FindPerformersResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\FindPerformersResultTypeField::count();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\FindPerformersResultTypeField<\Tests\Feature\Fixture\Stash\SelectionSet\PerformerSelectionSet>
     */
    public static function performers(): Fields\FindPerformersResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\FindPerformersResultTypeField::performers();
    }

    /**
     * @param array<\Tests\Feature\Fixture\Stash\Performer> $performers
     */
    public static function new(int $count, array $performers): self
    {
        $self = new self();
        $self->count = $count;
        $self->performers = $performers;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('count', $data)) {
            $self->count = $data['count'];
        }
        if (array_key_exists('performers', $data)) {
            $self->performers = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\Performer::fromArray($data);
            }, $data['performers'] ?? []);
        }

        return $self;
    }
}
