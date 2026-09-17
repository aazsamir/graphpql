<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class GroupDescription implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public Group $group;
    public ?string $description;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GroupDescriptionField<\Tests\Feature\Fixture\Stash\SelectionSet\GroupSelectionSet>
     */
    public static function group(): Fields\GroupDescriptionField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GroupDescriptionField::group();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GroupDescriptionField<mixed>
     */
    public static function description(): Fields\GroupDescriptionField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GroupDescriptionField::description();
    }

    public static function new(Group $group, ?string $description = null): self
    {
        $self = new self();
        $self->group = $group;
        $self->description = $description;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('group', $data)) {
            $self->group = \Tests\Feature\Fixture\Stash\Group::fromArray($data['group']);
        }
        if (array_key_exists('description', $data)) {
            $self->description = $data['description'];
        }

        return $self;
    }
}
