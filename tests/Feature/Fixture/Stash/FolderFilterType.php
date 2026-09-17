<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class FolderFilterType implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?FolderFilterType $AND;
    public ?FolderFilterType $OR;
    public ?FolderFilterType $NOT;
    public ?StringCriterionInput $path;
    public ?StringCriterionInput $basename;
    public ?HierarchicalMultiCriterionInput $parent_folder;
    public ?MultiCriterionInput $zip_file;
    public ?TimestampCriterionInput $mod_time;
    public ?IntCriterionInput $gallery_count;
    public ?FileFilterType $files_filter;
    public ?GalleryFilterType $galleries_filter;
    public ?TimestampCriterionInput $created_at;
    public ?TimestampCriterionInput $updated_at;

    public static function new(
        ?FolderFilterType $AND = null,
        ?FolderFilterType $OR = null,
        ?FolderFilterType $NOT = null,
        ?StringCriterionInput $path = null,
        ?StringCriterionInput $basename = null,
        ?HierarchicalMultiCriterionInput $parent_folder = null,
        ?MultiCriterionInput $zip_file = null,
        ?TimestampCriterionInput $mod_time = null,
        ?IntCriterionInput $gallery_count = null,
        ?FileFilterType $files_filter = null,
        ?GalleryFilterType $galleries_filter = null,
        ?TimestampCriterionInput $created_at = null,
        ?TimestampCriterionInput $updated_at = null,
    ): self {
        $self = new self();
        $self->AND = $AND;
        $self->OR = $OR;
        $self->NOT = $NOT;
        $self->path = $path;
        $self->basename = $basename;
        $self->parent_folder = $parent_folder;
        $self->zip_file = $zip_file;
        $self->mod_time = $mod_time;
        $self->gallery_count = $gallery_count;
        $self->files_filter = $files_filter;
        $self->galleries_filter = $galleries_filter;
        $self->created_at = $created_at;
        $self->updated_at = $updated_at;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('AND', $data)) {
            $self->AND = \Tests\Feature\Fixture\Stash\FolderFilterType::fromArray($data['AND']);
        }
        if (array_key_exists('OR', $data)) {
            $self->OR = \Tests\Feature\Fixture\Stash\FolderFilterType::fromArray($data['OR']);
        }
        if (array_key_exists('NOT', $data)) {
            $self->NOT = \Tests\Feature\Fixture\Stash\FolderFilterType::fromArray($data['NOT']);
        }
        if (array_key_exists('path', $data)) {
            $self->path = \Tests\Feature\Fixture\Stash\StringCriterionInput::fromArray($data['path']);
        }
        if (array_key_exists('basename', $data)) {
            $self->basename = \Tests\Feature\Fixture\Stash\StringCriterionInput::fromArray($data['basename']);
        }
        if (array_key_exists('parent_folder', $data)) {
            $self->parent_folder = \Tests\Feature\Fixture\Stash\HierarchicalMultiCriterionInput::fromArray($data['parent_folder']);
        }
        if (array_key_exists('zip_file', $data)) {
            $self->zip_file = \Tests\Feature\Fixture\Stash\MultiCriterionInput::fromArray($data['zip_file']);
        }
        if (array_key_exists('mod_time', $data)) {
            $self->mod_time = \Tests\Feature\Fixture\Stash\TimestampCriterionInput::fromArray($data['mod_time']);
        }
        if (array_key_exists('gallery_count', $data)) {
            $self->gallery_count = \Tests\Feature\Fixture\Stash\IntCriterionInput::fromArray($data['gallery_count']);
        }
        if (array_key_exists('files_filter', $data)) {
            $self->files_filter = \Tests\Feature\Fixture\Stash\FileFilterType::fromArray($data['files_filter']);
        }
        if (array_key_exists('galleries_filter', $data)) {
            $self->galleries_filter = \Tests\Feature\Fixture\Stash\GalleryFilterType::fromArray($data['galleries_filter']);
        }
        if (array_key_exists('created_at', $data)) {
            $self->created_at = \Tests\Feature\Fixture\Stash\TimestampCriterionInput::fromArray($data['created_at']);
        }
        if (array_key_exists('updated_at', $data)) {
            $self->updated_at = \Tests\Feature\Fixture\Stash\TimestampCriterionInput::fromArray($data['updated_at']);
        }

        return $self;
    }
}
