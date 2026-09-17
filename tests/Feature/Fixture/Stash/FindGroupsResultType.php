<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class FindGroupsResultType implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public int $count;

    /** @var array<\Tests\Feature\Fixture\Stash\Group> */
    public array $groups;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\FindGroupsResultTypeField<mixed>
     */
    public static function count(): Fields\FindGroupsResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\FindGroupsResultTypeField::count();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\FindGroupsResultTypeField<\Tests\Feature\Fixture\Stash\SelectionSet\GroupSelectionSet>
     */
    public static function groups(): Fields\FindGroupsResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\FindGroupsResultTypeField::groups();
    }

    /**
     * @param array<\Tests\Feature\Fixture\Stash\Group> $groups
     */
    public static function new(int $count, array $groups): self
    {
        $self = new self();
        $self->count = $count;
        $self->groups = $groups;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('count', $data)) {
            $self->count = $data['count'];
        }
        if (array_key_exists('groups', $data)) {
            $self->groups = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\Group::fromArray($data);
            }, $data['groups'] ?? []);
        }

        return $self;
    }
}
