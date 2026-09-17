<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class GalleryFilterType implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?GalleryFilterType $AND;
    public ?GalleryFilterType $OR;
    public ?GalleryFilterType $NOT;
    public ?IntCriterionInput $id;
    public ?StringCriterionInput $title;
    public ?StringCriterionInput $details;
    public ?StringCriterionInput $checksum;
    public ?StringCriterionInput $path;
    public ?IntCriterionInput $file_count;
    public ?string $is_missing;
    public ?bool $is_zip;
    public ?IntCriterionInput $rating100;
    public ?bool $organized;
    public ?ResolutionCriterionInput $average_resolution;
    public ?string $has_chapters;
    public ?MultiCriterionInput $scenes;
    public ?HierarchicalMultiCriterionInput $studios;
    public ?HierarchicalMultiCriterionInput $tags;
    public ?IntCriterionInput $tag_count;
    public ?HierarchicalMultiCriterionInput $performer_tags;
    public ?MultiCriterionInput $performers;
    public ?IntCriterionInput $performer_count;
    public ?bool $performer_favorite;
    public ?IntCriterionInput $performer_age;
    public ?IntCriterionInput $image_count;
    public ?StringCriterionInput $url;
    public ?DateCriterionInput $date;
    public ?TimestampCriterionInput $created_at;
    public ?TimestampCriterionInput $updated_at;
    public ?StringCriterionInput $code;
    public ?StringCriterionInput $photographer;
    public ?SceneFilterType $scenes_filter;
    public ?ImageFilterType $images_filter;
    public ?PerformerFilterType $performers_filter;
    public ?StudioFilterType $studios_filter;
    public ?TagFilterType $tags_filter;
    public ?FileFilterType $files_filter;
    public ?FolderFilterType $folders_filter;
    public ?HierarchicalMultiCriterionInput $parent_folder;

    /** @var array<\Tests\Feature\Fixture\Stash\CustomFieldCriterionInput> */
    public ?array $custom_fields;

    /**
     * @param array<\Tests\Feature\Fixture\Stash\CustomFieldCriterionInput> $custom_fields
     */
    public static function new(
        ?GalleryFilterType $AND = null,
        ?GalleryFilterType $OR = null,
        ?GalleryFilterType $NOT = null,
        ?IntCriterionInput $id = null,
        ?StringCriterionInput $title = null,
        ?StringCriterionInput $details = null,
        ?StringCriterionInput $checksum = null,
        ?StringCriterionInput $path = null,
        ?IntCriterionInput $file_count = null,
        ?string $is_missing = null,
        ?bool $is_zip = null,
        ?IntCriterionInput $rating100 = null,
        ?bool $organized = null,
        ?ResolutionCriterionInput $average_resolution = null,
        ?string $has_chapters = null,
        ?MultiCriterionInput $scenes = null,
        ?HierarchicalMultiCriterionInput $studios = null,
        ?HierarchicalMultiCriterionInput $tags = null,
        ?IntCriterionInput $tag_count = null,
        ?HierarchicalMultiCriterionInput $performer_tags = null,
        ?MultiCriterionInput $performers = null,
        ?IntCriterionInput $performer_count = null,
        ?bool $performer_favorite = null,
        ?IntCriterionInput $performer_age = null,
        ?IntCriterionInput $image_count = null,
        ?StringCriterionInput $url = null,
        ?DateCriterionInput $date = null,
        ?TimestampCriterionInput $created_at = null,
        ?TimestampCriterionInput $updated_at = null,
        ?StringCriterionInput $code = null,
        ?StringCriterionInput $photographer = null,
        ?SceneFilterType $scenes_filter = null,
        ?ImageFilterType $images_filter = null,
        ?PerformerFilterType $performers_filter = null,
        ?StudioFilterType $studios_filter = null,
        ?TagFilterType $tags_filter = null,
        ?FileFilterType $files_filter = null,
        ?FolderFilterType $folders_filter = null,
        ?HierarchicalMultiCriterionInput $parent_folder = null,
        ?array $custom_fields = null,
    ): self {
        $self = new self();
        $self->AND = $AND;
        $self->OR = $OR;
        $self->NOT = $NOT;
        $self->id = $id;
        $self->title = $title;
        $self->details = $details;
        $self->checksum = $checksum;
        $self->path = $path;
        $self->file_count = $file_count;
        $self->is_missing = $is_missing;
        $self->is_zip = $is_zip;
        $self->rating100 = $rating100;
        $self->organized = $organized;
        $self->average_resolution = $average_resolution;
        $self->has_chapters = $has_chapters;
        $self->scenes = $scenes;
        $self->studios = $studios;
        $self->tags = $tags;
        $self->tag_count = $tag_count;
        $self->performer_tags = $performer_tags;
        $self->performers = $performers;
        $self->performer_count = $performer_count;
        $self->performer_favorite = $performer_favorite;
        $self->performer_age = $performer_age;
        $self->image_count = $image_count;
        $self->url = $url;
        $self->date = $date;
        $self->created_at = $created_at;
        $self->updated_at = $updated_at;
        $self->code = $code;
        $self->photographer = $photographer;
        $self->scenes_filter = $scenes_filter;
        $self->images_filter = $images_filter;
        $self->performers_filter = $performers_filter;
        $self->studios_filter = $studios_filter;
        $self->tags_filter = $tags_filter;
        $self->files_filter = $files_filter;
        $self->folders_filter = $folders_filter;
        $self->parent_folder = $parent_folder;
        $self->custom_fields = $custom_fields;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('AND', $data)) {
            $self->AND = \Tests\Feature\Fixture\Stash\GalleryFilterType::fromArray($data['AND']);
        }
        if (array_key_exists('OR', $data)) {
            $self->OR = \Tests\Feature\Fixture\Stash\GalleryFilterType::fromArray($data['OR']);
        }
        if (array_key_exists('NOT', $data)) {
            $self->NOT = \Tests\Feature\Fixture\Stash\GalleryFilterType::fromArray($data['NOT']);
        }
        if (array_key_exists('id', $data)) {
            $self->id = \Tests\Feature\Fixture\Stash\IntCriterionInput::fromArray($data['id']);
        }
        if (array_key_exists('title', $data)) {
            $self->title = \Tests\Feature\Fixture\Stash\StringCriterionInput::fromArray($data['title']);
        }
        if (array_key_exists('details', $data)) {
            $self->details = \Tests\Feature\Fixture\Stash\StringCriterionInput::fromArray($data['details']);
        }
        if (array_key_exists('checksum', $data)) {
            $self->checksum = \Tests\Feature\Fixture\Stash\StringCriterionInput::fromArray($data['checksum']);
        }
        if (array_key_exists('path', $data)) {
            $self->path = \Tests\Feature\Fixture\Stash\StringCriterionInput::fromArray($data['path']);
        }
        if (array_key_exists('file_count', $data)) {
            $self->file_count = \Tests\Feature\Fixture\Stash\IntCriterionInput::fromArray($data['file_count']);
        }
        if (array_key_exists('is_missing', $data)) {
            $self->is_missing = $data['is_missing'];
        }
        if (array_key_exists('is_zip', $data)) {
            $self->is_zip = $data['is_zip'];
        }
        if (array_key_exists('rating100', $data)) {
            $self->rating100 = \Tests\Feature\Fixture\Stash\IntCriterionInput::fromArray($data['rating100']);
        }
        if (array_key_exists('organized', $data)) {
            $self->organized = $data['organized'];
        }
        if (array_key_exists('average_resolution', $data)) {
            $self->average_resolution = \Tests\Feature\Fixture\Stash\ResolutionCriterionInput::fromArray($data['average_resolution']);
        }
        if (array_key_exists('has_chapters', $data)) {
            $self->has_chapters = $data['has_chapters'];
        }
        if (array_key_exists('scenes', $data)) {
            $self->scenes = \Tests\Feature\Fixture\Stash\MultiCriterionInput::fromArray($data['scenes']);
        }
        if (array_key_exists('studios', $data)) {
            $self->studios = \Tests\Feature\Fixture\Stash\HierarchicalMultiCriterionInput::fromArray($data['studios']);
        }
        if (array_key_exists('tags', $data)) {
            $self->tags = \Tests\Feature\Fixture\Stash\HierarchicalMultiCriterionInput::fromArray($data['tags']);
        }
        if (array_key_exists('tag_count', $data)) {
            $self->tag_count = \Tests\Feature\Fixture\Stash\IntCriterionInput::fromArray($data['tag_count']);
        }
        if (array_key_exists('performer_tags', $data)) {
            $self->performer_tags = \Tests\Feature\Fixture\Stash\HierarchicalMultiCriterionInput::fromArray($data['performer_tags']);
        }
        if (array_key_exists('performers', $data)) {
            $self->performers = \Tests\Feature\Fixture\Stash\MultiCriterionInput::fromArray($data['performers']);
        }
        if (array_key_exists('performer_count', $data)) {
            $self->performer_count = \Tests\Feature\Fixture\Stash\IntCriterionInput::fromArray($data['performer_count']);
        }
        if (array_key_exists('performer_favorite', $data)) {
            $self->performer_favorite = $data['performer_favorite'];
        }
        if (array_key_exists('performer_age', $data)) {
            $self->performer_age = \Tests\Feature\Fixture\Stash\IntCriterionInput::fromArray($data['performer_age']);
        }
        if (array_key_exists('image_count', $data)) {
            $self->image_count = \Tests\Feature\Fixture\Stash\IntCriterionInput::fromArray($data['image_count']);
        }
        if (array_key_exists('url', $data)) {
            $self->url = \Tests\Feature\Fixture\Stash\StringCriterionInput::fromArray($data['url']);
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
        if (array_key_exists('code', $data)) {
            $self->code = \Tests\Feature\Fixture\Stash\StringCriterionInput::fromArray($data['code']);
        }
        if (array_key_exists('photographer', $data)) {
            $self->photographer = \Tests\Feature\Fixture\Stash\StringCriterionInput::fromArray($data['photographer']);
        }
        if (array_key_exists('scenes_filter', $data)) {
            $self->scenes_filter = \Tests\Feature\Fixture\Stash\SceneFilterType::fromArray($data['scenes_filter']);
        }
        if (array_key_exists('images_filter', $data)) {
            $self->images_filter = \Tests\Feature\Fixture\Stash\ImageFilterType::fromArray($data['images_filter']);
        }
        if (array_key_exists('performers_filter', $data)) {
            $self->performers_filter = \Tests\Feature\Fixture\Stash\PerformerFilterType::fromArray($data['performers_filter']);
        }
        if (array_key_exists('studios_filter', $data)) {
            $self->studios_filter = \Tests\Feature\Fixture\Stash\StudioFilterType::fromArray($data['studios_filter']);
        }
        if (array_key_exists('tags_filter', $data)) {
            $self->tags_filter = \Tests\Feature\Fixture\Stash\TagFilterType::fromArray($data['tags_filter']);
        }
        if (array_key_exists('files_filter', $data)) {
            $self->files_filter = \Tests\Feature\Fixture\Stash\FileFilterType::fromArray($data['files_filter']);
        }
        if (array_key_exists('folders_filter', $data)) {
            $self->folders_filter = \Tests\Feature\Fixture\Stash\FolderFilterType::fromArray($data['folders_filter']);
        }
        if (array_key_exists('parent_folder', $data)) {
            $self->parent_folder = \Tests\Feature\Fixture\Stash\HierarchicalMultiCriterionInput::fromArray($data['parent_folder']);
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
