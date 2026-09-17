<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class FindSceneMarkersResultType implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public int $count;

    /** @var array<\Tests\Feature\Fixture\Stash\SceneMarker> */
    public array $scene_markers;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\FindSceneMarkersResultTypeField<mixed>
     */
    public static function count(): Fields\FindSceneMarkersResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\FindSceneMarkersResultTypeField::count();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\FindSceneMarkersResultTypeField<\Tests\Feature\Fixture\Stash\SelectionSet\SceneMarkerSelectionSet>
     */
    public static function scene_markers(): Fields\FindSceneMarkersResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\FindSceneMarkersResultTypeField::scene_markers();
    }

    /**
     * @param array<\Tests\Feature\Fixture\Stash\SceneMarker> $scene_markers
     */
    public static function new(int $count, array $scene_markers): self
    {
        $self = new self();
        $self->count = $count;
        $self->scene_markers = $scene_markers;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('count', $data)) {
            $self->count = $data['count'];
        }
        if (array_key_exists('scene_markers', $data)) {
            $self->scene_markers = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\SceneMarker::fromArray($data);
            }, $data['scene_markers'] ?? []);
        }

        return $self;
    }
}
