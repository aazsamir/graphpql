<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class SceneMarkerTag implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public Tag $tag;

    /** @var array<\Tests\Feature\Fixture\Stash\SceneMarker> */
    public array $scene_markers;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneMarkerTagField<\Tests\Feature\Fixture\Stash\SelectionSet\TagSelectionSet>
     */
    public static function tag(): Fields\SceneMarkerTagField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneMarkerTagField::tag();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneMarkerTagField<\Tests\Feature\Fixture\Stash\SelectionSet\SceneMarkerSelectionSet>
     */
    public static function scene_markers(): Fields\SceneMarkerTagField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneMarkerTagField::scene_markers();
    }

    /**
     * @param array<\Tests\Feature\Fixture\Stash\SceneMarker> $scene_markers
     */
    public static function new(Tag $tag, array $scene_markers): self
    {
        $self = new self();
        $self->tag = $tag;
        $self->scene_markers = $scene_markers;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('tag', $data)) {
            $self->tag = \Tests\Feature\Fixture\Stash\Tag::fromArray($data['tag']);
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
