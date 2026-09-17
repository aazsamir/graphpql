<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class BulkTagUpdateInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    /** @var array<string> */
    public ?array $ids;
    public ?string $description;
    public ?BulkUpdateStrings $aliases;
    public ?bool $ignore_auto_tag;
    public ?bool $favorite;
    public ?BulkUpdateIds $parent_ids;
    public ?BulkUpdateIds $child_ids;

    /**
     * @param array<string> $ids
     */
    public static function new(
        ?array $ids = null,
        ?string $description = null,
        ?BulkUpdateStrings $aliases = null,
        ?bool $ignore_auto_tag = null,
        ?bool $favorite = null,
        ?BulkUpdateIds $parent_ids = null,
        ?BulkUpdateIds $child_ids = null,
    ): self {
        $self = new self();
        $self->ids = $ids;
        $self->description = $description;
        $self->aliases = $aliases;
        $self->ignore_auto_tag = $ignore_auto_tag;
        $self->favorite = $favorite;
        $self->parent_ids = $parent_ids;
        $self->child_ids = $child_ids;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('ids', $data)) {
            $self->ids = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['ids'] ?? []);
        }
        if (array_key_exists('description', $data)) {
            $self->description = $data['description'];
        }
        if (array_key_exists('aliases', $data)) {
            $self->aliases = \Tests\Feature\Fixture\Stash\BulkUpdateStrings::fromArray($data['aliases']);
        }
        if (array_key_exists('ignore_auto_tag', $data)) {
            $self->ignore_auto_tag = $data['ignore_auto_tag'];
        }
        if (array_key_exists('favorite', $data)) {
            $self->favorite = $data['favorite'];
        }
        if (array_key_exists('parent_ids', $data)) {
            $self->parent_ids = \Tests\Feature\Fixture\Stash\BulkUpdateIds::fromArray($data['parent_ids']);
        }
        if (array_key_exists('child_ids', $data)) {
            $self->child_ids = \Tests\Feature\Fixture\Stash\BulkUpdateIds::fromArray($data['child_ids']);
        }

        return $self;
    }
}
