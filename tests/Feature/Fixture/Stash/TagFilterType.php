<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class TagFilterType implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?TagFilterType $AND;
    public ?TagFilterType $OR;
    public ?TagFilterType $NOT;
    public ?StringCriterionInput $name;
    public ?StringCriterionInput $sort_name;
    public ?StringCriterionInput $aliases;
    public ?bool $favorite;
    public ?StringCriterionInput $description;
    public ?string $is_missing;
    public ?IntCriterionInput $scene_count;
    public ?IntCriterionInput $image_count;
    public ?IntCriterionInput $gallery_count;
    public ?IntCriterionInput $performer_count;
    public ?IntCriterionInput $studio_count;
    public ?IntCriterionInput $movie_count;
    public ?IntCriterionInput $group_count;
    public ?IntCriterionInput $marker_count;
    public ?HierarchicalMultiCriterionInput $parents;
    public ?HierarchicalMultiCriterionInput $children;
    public ?IntCriterionInput $parent_count;
    public ?IntCriterionInput $child_count;
    public ?bool $ignore_auto_tag;
    public ?StashIDCriterionInput $stash_id_endpoint;
    public ?StashIDsCriterionInput $stash_ids_endpoint;
    public ?SceneFilterType $scenes_filter;
    public ?ImageFilterType $images_filter;
    public ?GalleryFilterType $galleries_filter;
    public ?GroupFilterType $groups_filter;
    public ?PerformerFilterType $performers_filter;
    public ?StudioFilterType $studios_filter;
    public ?SceneMarkerFilterType $markers_filter;
    public ?TimestampCriterionInput $created_at;
    public ?TimestampCriterionInput $updated_at;

    /** @var array<\Tests\Feature\Fixture\Stash\CustomFieldCriterionInput> */
    public ?array $custom_fields;

    /**
     * @param array<\Tests\Feature\Fixture\Stash\CustomFieldCriterionInput> $custom_fields
     */
    public static function new(
        ?TagFilterType $AND = null,
        ?TagFilterType $OR = null,
        ?TagFilterType $NOT = null,
        ?StringCriterionInput $name = null,
        ?StringCriterionInput $sort_name = null,
        ?StringCriterionInput $aliases = null,
        ?bool $favorite = null,
        ?StringCriterionInput $description = null,
        ?string $is_missing = null,
        ?IntCriterionInput $scene_count = null,
        ?IntCriterionInput $image_count = null,
        ?IntCriterionInput $gallery_count = null,
        ?IntCriterionInput $performer_count = null,
        ?IntCriterionInput $studio_count = null,
        ?IntCriterionInput $movie_count = null,
        ?IntCriterionInput $group_count = null,
        ?IntCriterionInput $marker_count = null,
        ?HierarchicalMultiCriterionInput $parents = null,
        ?HierarchicalMultiCriterionInput $children = null,
        ?IntCriterionInput $parent_count = null,
        ?IntCriterionInput $child_count = null,
        ?bool $ignore_auto_tag = null,
        ?StashIDCriterionInput $stash_id_endpoint = null,
        ?StashIDsCriterionInput $stash_ids_endpoint = null,
        ?SceneFilterType $scenes_filter = null,
        ?ImageFilterType $images_filter = null,
        ?GalleryFilterType $galleries_filter = null,
        ?GroupFilterType $groups_filter = null,
        ?PerformerFilterType $performers_filter = null,
        ?StudioFilterType $studios_filter = null,
        ?SceneMarkerFilterType $markers_filter = null,
        ?TimestampCriterionInput $created_at = null,
        ?TimestampCriterionInput $updated_at = null,
        ?array $custom_fields = null,
    ): self {
        $self = new self();
        $self->AND = $AND;
        $self->OR = $OR;
        $self->NOT = $NOT;
        $self->name = $name;
        $self->sort_name = $sort_name;
        $self->aliases = $aliases;
        $self->favorite = $favorite;
        $self->description = $description;
        $self->is_missing = $is_missing;
        $self->scene_count = $scene_count;
        $self->image_count = $image_count;
        $self->gallery_count = $gallery_count;
        $self->performer_count = $performer_count;
        $self->studio_count = $studio_count;
        $self->movie_count = $movie_count;
        $self->group_count = $group_count;
        $self->marker_count = $marker_count;
        $self->parents = $parents;
        $self->children = $children;
        $self->parent_count = $parent_count;
        $self->child_count = $child_count;
        $self->ignore_auto_tag = $ignore_auto_tag;
        $self->stash_id_endpoint = $stash_id_endpoint;
        $self->stash_ids_endpoint = $stash_ids_endpoint;
        $self->scenes_filter = $scenes_filter;
        $self->images_filter = $images_filter;
        $self->galleries_filter = $galleries_filter;
        $self->groups_filter = $groups_filter;
        $self->performers_filter = $performers_filter;
        $self->studios_filter = $studios_filter;
        $self->markers_filter = $markers_filter;
        $self->created_at = $created_at;
        $self->updated_at = $updated_at;
        $self->custom_fields = $custom_fields;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('AND', $data)) {
            $self->AND = \Tests\Feature\Fixture\Stash\TagFilterType::fromArray($data['AND']);
        }
        if (array_key_exists('OR', $data)) {
            $self->OR = \Tests\Feature\Fixture\Stash\TagFilterType::fromArray($data['OR']);
        }
        if (array_key_exists('NOT', $data)) {
            $self->NOT = \Tests\Feature\Fixture\Stash\TagFilterType::fromArray($data['NOT']);
        }
        if (array_key_exists('name', $data)) {
            $self->name = \Tests\Feature\Fixture\Stash\StringCriterionInput::fromArray($data['name']);
        }
        if (array_key_exists('sort_name', $data)) {
            $self->sort_name = \Tests\Feature\Fixture\Stash\StringCriterionInput::fromArray($data['sort_name']);
        }
        if (array_key_exists('aliases', $data)) {
            $self->aliases = \Tests\Feature\Fixture\Stash\StringCriterionInput::fromArray($data['aliases']);
        }
        if (array_key_exists('favorite', $data)) {
            $self->favorite = $data['favorite'];
        }
        if (array_key_exists('description', $data)) {
            $self->description = \Tests\Feature\Fixture\Stash\StringCriterionInput::fromArray($data['description']);
        }
        if (array_key_exists('is_missing', $data)) {
            $self->is_missing = $data['is_missing'];
        }
        if (array_key_exists('scene_count', $data)) {
            $self->scene_count = \Tests\Feature\Fixture\Stash\IntCriterionInput::fromArray($data['scene_count']);
        }
        if (array_key_exists('image_count', $data)) {
            $self->image_count = \Tests\Feature\Fixture\Stash\IntCriterionInput::fromArray($data['image_count']);
        }
        if (array_key_exists('gallery_count', $data)) {
            $self->gallery_count = \Tests\Feature\Fixture\Stash\IntCriterionInput::fromArray($data['gallery_count']);
        }
        if (array_key_exists('performer_count', $data)) {
            $self->performer_count = \Tests\Feature\Fixture\Stash\IntCriterionInput::fromArray($data['performer_count']);
        }
        if (array_key_exists('studio_count', $data)) {
            $self->studio_count = \Tests\Feature\Fixture\Stash\IntCriterionInput::fromArray($data['studio_count']);
        }
        if (array_key_exists('movie_count', $data)) {
            $self->movie_count = \Tests\Feature\Fixture\Stash\IntCriterionInput::fromArray($data['movie_count']);
        }
        if (array_key_exists('group_count', $data)) {
            $self->group_count = \Tests\Feature\Fixture\Stash\IntCriterionInput::fromArray($data['group_count']);
        }
        if (array_key_exists('marker_count', $data)) {
            $self->marker_count = \Tests\Feature\Fixture\Stash\IntCriterionInput::fromArray($data['marker_count']);
        }
        if (array_key_exists('parents', $data)) {
            $self->parents = \Tests\Feature\Fixture\Stash\HierarchicalMultiCriterionInput::fromArray($data['parents']);
        }
        if (array_key_exists('children', $data)) {
            $self->children = \Tests\Feature\Fixture\Stash\HierarchicalMultiCriterionInput::fromArray($data['children']);
        }
        if (array_key_exists('parent_count', $data)) {
            $self->parent_count = \Tests\Feature\Fixture\Stash\IntCriterionInput::fromArray($data['parent_count']);
        }
        if (array_key_exists('child_count', $data)) {
            $self->child_count = \Tests\Feature\Fixture\Stash\IntCriterionInput::fromArray($data['child_count']);
        }
        if (array_key_exists('ignore_auto_tag', $data)) {
            $self->ignore_auto_tag = $data['ignore_auto_tag'];
        }
        if (array_key_exists('stash_id_endpoint', $data)) {
            $self->stash_id_endpoint = \Tests\Feature\Fixture\Stash\StashIDCriterionInput::fromArray($data['stash_id_endpoint']);
        }
        if (array_key_exists('stash_ids_endpoint', $data)) {
            $self->stash_ids_endpoint = \Tests\Feature\Fixture\Stash\StashIDsCriterionInput::fromArray($data['stash_ids_endpoint']);
        }
        if (array_key_exists('scenes_filter', $data)) {
            $self->scenes_filter = \Tests\Feature\Fixture\Stash\SceneFilterType::fromArray($data['scenes_filter']);
        }
        if (array_key_exists('images_filter', $data)) {
            $self->images_filter = \Tests\Feature\Fixture\Stash\ImageFilterType::fromArray($data['images_filter']);
        }
        if (array_key_exists('galleries_filter', $data)) {
            $self->galleries_filter = \Tests\Feature\Fixture\Stash\GalleryFilterType::fromArray($data['galleries_filter']);
        }
        if (array_key_exists('groups_filter', $data)) {
            $self->groups_filter = \Tests\Feature\Fixture\Stash\GroupFilterType::fromArray($data['groups_filter']);
        }
        if (array_key_exists('performers_filter', $data)) {
            $self->performers_filter = \Tests\Feature\Fixture\Stash\PerformerFilterType::fromArray($data['performers_filter']);
        }
        if (array_key_exists('studios_filter', $data)) {
            $self->studios_filter = \Tests\Feature\Fixture\Stash\StudioFilterType::fromArray($data['studios_filter']);
        }
        if (array_key_exists('markers_filter', $data)) {
            $self->markers_filter = \Tests\Feature\Fixture\Stash\SceneMarkerFilterType::fromArray($data['markers_filter']);
        }
        if (array_key_exists('created_at', $data)) {
            $self->created_at = \Tests\Feature\Fixture\Stash\TimestampCriterionInput::fromArray($data['created_at']);
        }
        if (array_key_exists('updated_at', $data)) {
            $self->updated_at = \Tests\Feature\Fixture\Stash\TimestampCriterionInput::fromArray($data['updated_at']);
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
