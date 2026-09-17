<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class SceneMarkerFilterType implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?HierarchicalMultiCriterionInput $tags;
    public ?HierarchicalMultiCriterionInput $scene_tags;
    public ?MultiCriterionInput $performers;
    public ?MultiCriterionInput $scenes;
    public ?FloatCriterionInput $duration;
    public ?TimestampCriterionInput $created_at;
    public ?TimestampCriterionInput $updated_at;
    public ?DateCriterionInput $scene_date;
    public ?TimestampCriterionInput $scene_created_at;
    public ?TimestampCriterionInput $scene_updated_at;
    public ?SceneFilterType $scene_filter;

    public static function new(
        ?HierarchicalMultiCriterionInput $tags = null,
        ?HierarchicalMultiCriterionInput $scene_tags = null,
        ?MultiCriterionInput $performers = null,
        ?MultiCriterionInput $scenes = null,
        ?FloatCriterionInput $duration = null,
        ?TimestampCriterionInput $created_at = null,
        ?TimestampCriterionInput $updated_at = null,
        ?DateCriterionInput $scene_date = null,
        ?TimestampCriterionInput $scene_created_at = null,
        ?TimestampCriterionInput $scene_updated_at = null,
        ?SceneFilterType $scene_filter = null,
    ): self {
        $self = new self();
        $self->tags = $tags;
        $self->scene_tags = $scene_tags;
        $self->performers = $performers;
        $self->scenes = $scenes;
        $self->duration = $duration;
        $self->created_at = $created_at;
        $self->updated_at = $updated_at;
        $self->scene_date = $scene_date;
        $self->scene_created_at = $scene_created_at;
        $self->scene_updated_at = $scene_updated_at;
        $self->scene_filter = $scene_filter;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('tags', $data)) {
            $self->tags = \Tests\Feature\Fixture\Stash\HierarchicalMultiCriterionInput::fromArray($data['tags']);
        }
        if (array_key_exists('scene_tags', $data)) {
            $self->scene_tags = \Tests\Feature\Fixture\Stash\HierarchicalMultiCriterionInput::fromArray($data['scene_tags']);
        }
        if (array_key_exists('performers', $data)) {
            $self->performers = \Tests\Feature\Fixture\Stash\MultiCriterionInput::fromArray($data['performers']);
        }
        if (array_key_exists('scenes', $data)) {
            $self->scenes = \Tests\Feature\Fixture\Stash\MultiCriterionInput::fromArray($data['scenes']);
        }
        if (array_key_exists('duration', $data)) {
            $self->duration = \Tests\Feature\Fixture\Stash\FloatCriterionInput::fromArray($data['duration']);
        }
        if (array_key_exists('created_at', $data)) {
            $self->created_at = \Tests\Feature\Fixture\Stash\TimestampCriterionInput::fromArray($data['created_at']);
        }
        if (array_key_exists('updated_at', $data)) {
            $self->updated_at = \Tests\Feature\Fixture\Stash\TimestampCriterionInput::fromArray($data['updated_at']);
        }
        if (array_key_exists('scene_date', $data)) {
            $self->scene_date = \Tests\Feature\Fixture\Stash\DateCriterionInput::fromArray($data['scene_date']);
        }
        if (array_key_exists('scene_created_at', $data)) {
            $self->scene_created_at = \Tests\Feature\Fixture\Stash\TimestampCriterionInput::fromArray($data['scene_created_at']);
        }
        if (array_key_exists('scene_updated_at', $data)) {
            $self->scene_updated_at = \Tests\Feature\Fixture\Stash\TimestampCriterionInput::fromArray($data['scene_updated_at']);
        }
        if (array_key_exists('scene_filter', $data)) {
            $self->scene_filter = \Tests\Feature\Fixture\Stash\SceneFilterType::fromArray($data['scene_filter']);
        }

        return $self;
    }
}
