<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class GroupFilterType implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?GroupFilterType $AND;
    public ?GroupFilterType $OR;
    public ?GroupFilterType $NOT;
    public ?StringCriterionInput $name;
    public ?StringCriterionInput $director;
    public ?StringCriterionInput $synopsis;
    public ?IntCriterionInput $duration;
    public ?IntCriterionInput $rating100;
    public ?HierarchicalMultiCriterionInput $studios;
    public ?string $is_missing;
    public ?StringCriterionInput $url;
    public ?MultiCriterionInput $performers;
    public ?HierarchicalMultiCriterionInput $tags;
    public ?IntCriterionInput $tag_count;
    public ?DateCriterionInput $date;
    public ?TimestampCriterionInput $created_at;
    public ?TimestampCriterionInput $updated_at;
    public ?IntCriterionInput $o_counter;
    public ?HierarchicalMultiCriterionInput $containing_groups;
    public ?HierarchicalMultiCriterionInput $sub_groups;
    public ?IntCriterionInput $containing_group_count;
    public ?IntCriterionInput $sub_group_count;
    public ?IntCriterionInput $scene_count;
    public ?SceneFilterType $scenes_filter;
    public ?StudioFilterType $studios_filter;

    /** @var array<\Tests\Feature\Fixture\Stash\CustomFieldCriterionInput> */
    public ?array $custom_fields;

    /**
     * @param array<\Tests\Feature\Fixture\Stash\CustomFieldCriterionInput> $custom_fields
     */
    public static function new(
        ?GroupFilterType $AND = null,
        ?GroupFilterType $OR = null,
        ?GroupFilterType $NOT = null,
        ?StringCriterionInput $name = null,
        ?StringCriterionInput $director = null,
        ?StringCriterionInput $synopsis = null,
        ?IntCriterionInput $duration = null,
        ?IntCriterionInput $rating100 = null,
        ?HierarchicalMultiCriterionInput $studios = null,
        ?string $is_missing = null,
        ?StringCriterionInput $url = null,
        ?MultiCriterionInput $performers = null,
        ?HierarchicalMultiCriterionInput $tags = null,
        ?IntCriterionInput $tag_count = null,
        ?DateCriterionInput $date = null,
        ?TimestampCriterionInput $created_at = null,
        ?TimestampCriterionInput $updated_at = null,
        ?IntCriterionInput $o_counter = null,
        ?HierarchicalMultiCriterionInput $containing_groups = null,
        ?HierarchicalMultiCriterionInput $sub_groups = null,
        ?IntCriterionInput $containing_group_count = null,
        ?IntCriterionInput $sub_group_count = null,
        ?IntCriterionInput $scene_count = null,
        ?SceneFilterType $scenes_filter = null,
        ?StudioFilterType $studios_filter = null,
        ?array $custom_fields = null,
    ): self {
        $self = new self();
        $self->AND = $AND;
        $self->OR = $OR;
        $self->NOT = $NOT;
        $self->name = $name;
        $self->director = $director;
        $self->synopsis = $synopsis;
        $self->duration = $duration;
        $self->rating100 = $rating100;
        $self->studios = $studios;
        $self->is_missing = $is_missing;
        $self->url = $url;
        $self->performers = $performers;
        $self->tags = $tags;
        $self->tag_count = $tag_count;
        $self->date = $date;
        $self->created_at = $created_at;
        $self->updated_at = $updated_at;
        $self->o_counter = $o_counter;
        $self->containing_groups = $containing_groups;
        $self->sub_groups = $sub_groups;
        $self->containing_group_count = $containing_group_count;
        $self->sub_group_count = $sub_group_count;
        $self->scene_count = $scene_count;
        $self->scenes_filter = $scenes_filter;
        $self->studios_filter = $studios_filter;
        $self->custom_fields = $custom_fields;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('AND', $data)) {
            $self->AND = \Tests\Feature\Fixture\Stash\GroupFilterType::fromArray($data['AND']);
        }
        if (array_key_exists('OR', $data)) {
            $self->OR = \Tests\Feature\Fixture\Stash\GroupFilterType::fromArray($data['OR']);
        }
        if (array_key_exists('NOT', $data)) {
            $self->NOT = \Tests\Feature\Fixture\Stash\GroupFilterType::fromArray($data['NOT']);
        }
        if (array_key_exists('name', $data)) {
            $self->name = \Tests\Feature\Fixture\Stash\StringCriterionInput::fromArray($data['name']);
        }
        if (array_key_exists('director', $data)) {
            $self->director = \Tests\Feature\Fixture\Stash\StringCriterionInput::fromArray($data['director']);
        }
        if (array_key_exists('synopsis', $data)) {
            $self->synopsis = \Tests\Feature\Fixture\Stash\StringCriterionInput::fromArray($data['synopsis']);
        }
        if (array_key_exists('duration', $data)) {
            $self->duration = \Tests\Feature\Fixture\Stash\IntCriterionInput::fromArray($data['duration']);
        }
        if (array_key_exists('rating100', $data)) {
            $self->rating100 = \Tests\Feature\Fixture\Stash\IntCriterionInput::fromArray($data['rating100']);
        }
        if (array_key_exists('studios', $data)) {
            $self->studios = \Tests\Feature\Fixture\Stash\HierarchicalMultiCriterionInput::fromArray($data['studios']);
        }
        if (array_key_exists('is_missing', $data)) {
            $self->is_missing = $data['is_missing'];
        }
        if (array_key_exists('url', $data)) {
            $self->url = \Tests\Feature\Fixture\Stash\StringCriterionInput::fromArray($data['url']);
        }
        if (array_key_exists('performers', $data)) {
            $self->performers = \Tests\Feature\Fixture\Stash\MultiCriterionInput::fromArray($data['performers']);
        }
        if (array_key_exists('tags', $data)) {
            $self->tags = \Tests\Feature\Fixture\Stash\HierarchicalMultiCriterionInput::fromArray($data['tags']);
        }
        if (array_key_exists('tag_count', $data)) {
            $self->tag_count = \Tests\Feature\Fixture\Stash\IntCriterionInput::fromArray($data['tag_count']);
        }
        if (array_key_exists('date', $data)) {
            $self->date = \Tests\Feature\Fixture\Stash\DateCriterionInput::fromArray($data['date']);
        }
        if (array_key_exists('created_at', $data)) {
            $self->created_at = \Tests\Feature\Fixture\Stash\TimestampCriterionInput::fromArray($data['created_at']);
        }
        if (array_key_exists('updated_at', $data)) {
            $self->updated_at = \Tests\Feature\Fixture\Stash\TimestampCriterionInput::fromArray($data['updated_at']);
        }
        if (array_key_exists('o_counter', $data)) {
            $self->o_counter = \Tests\Feature\Fixture\Stash\IntCriterionInput::fromArray($data['o_counter']);
        }
        if (array_key_exists('containing_groups', $data)) {
            $self->containing_groups = \Tests\Feature\Fixture\Stash\HierarchicalMultiCriterionInput::fromArray($data['containing_groups']);
        }
        if (array_key_exists('sub_groups', $data)) {
            $self->sub_groups = \Tests\Feature\Fixture\Stash\HierarchicalMultiCriterionInput::fromArray($data['sub_groups']);
        }
        if (array_key_exists('containing_group_count', $data)) {
            $self->containing_group_count = \Tests\Feature\Fixture\Stash\IntCriterionInput::fromArray($data['containing_group_count']);
        }
        if (array_key_exists('sub_group_count', $data)) {
            $self->sub_group_count = \Tests\Feature\Fixture\Stash\IntCriterionInput::fromArray($data['sub_group_count']);
        }
        if (array_key_exists('scene_count', $data)) {
            $self->scene_count = \Tests\Feature\Fixture\Stash\IntCriterionInput::fromArray($data['scene_count']);
        }
        if (array_key_exists('scenes_filter', $data)) {
            $self->scenes_filter = \Tests\Feature\Fixture\Stash\SceneFilterType::fromArray($data['scenes_filter']);
        }
        if (array_key_exists('studios_filter', $data)) {
            $self->studios_filter = \Tests\Feature\Fixture\Stash\StudioFilterType::fromArray($data['studios_filter']);
        }
        if (array_key_exists('custom_fields', $data)) {
            $self->custom_fields = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\CustomFieldCriterionInput::fromArray($data);
            }, $data['custom_fields'] ?? []);
        }

        return $self;
    }
}
