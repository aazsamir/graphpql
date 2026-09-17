<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class SceneGroup implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public Group $group;
    public ?int $scene_index;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneGroupField<\Tests\Feature\Fixture\Stash\SelectionSet\GroupSelectionSet>
     */
    public static function group(): Fields\SceneGroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneGroupField::group();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneGroupField<mixed>
     */
    public static function scene_index(): Fields\SceneGroupField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneGroupField::scene_index();
    }

    public static function new(Group $group, ?int $scene_index = null): self
    {
        $self = new self();
        $self->group = $group;
        $self->scene_index = $scene_index;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('group', $data)) {
            $self->group = \Tests\Feature\Fixture\Stash\Group::fromArray($data['group']);
        }
        if (array_key_exists('scene_index', $data)) {
            $self->scene_index = $data['scene_index'];
        }

        return $self;
    }
}
