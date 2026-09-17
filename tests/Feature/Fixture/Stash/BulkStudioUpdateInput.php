<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class BulkStudioUpdateInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    /** @var array<string> */
    public array $ids;
    public ?string $url;
    public ?BulkUpdateStrings $urls;
    public ?string $parent_id;
    public ?int $rating100;
    public ?bool $favorite;
    public ?string $details;
    public ?BulkUpdateIds $tag_ids;
    public ?bool $ignore_auto_tag;
    public ?bool $organized;

    /**
     * @param array<string> $ids
     */
    public static function new(
        array $ids,
        ?string $url = null,
        ?BulkUpdateStrings $urls = null,
        ?string $parent_id = null,
        ?int $rating100 = null,
        ?bool $favorite = null,
        ?string $details = null,
        ?BulkUpdateIds $tag_ids = null,
        ?bool $ignore_auto_tag = null,
        ?bool $organized = null,
    ): self {
        $self = new self();
        $self->ids = $ids;
        $self->url = $url;
        $self->urls = $urls;
        $self->parent_id = $parent_id;
        $self->rating100 = $rating100;
        $self->favorite = $favorite;
        $self->details = $details;
        $self->tag_ids = $tag_ids;
        $self->ignore_auto_tag = $ignore_auto_tag;
        $self->organized = $organized;

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
        if (array_key_exists('url', $data)) {
            $self->url = $data['url'];
        }
        if (array_key_exists('urls', $data)) {
            $self->urls = \Tests\Feature\Fixture\Stash\BulkUpdateStrings::fromArray($data['urls']);
        }
        if (array_key_exists('parent_id', $data)) {
            $self->parent_id = $data['parent_id'];
        }
        if (array_key_exists('rating100', $data)) {
            $self->rating100 = $data['rating100'];
        }
        if (array_key_exists('favorite', $data)) {
            $self->favorite = $data['favorite'];
        }
        if (array_key_exists('details', $data)) {
            $self->details = $data['details'];
        }
        if (array_key_exists('tag_ids', $data)) {
            $self->tag_ids = \Tests\Feature\Fixture\Stash\BulkUpdateIds::fromArray($data['tag_ids']);
        }
        if (array_key_exists('ignore_auto_tag', $data)) {
            $self->ignore_auto_tag = $data['ignore_auto_tag'];
        }
        if (array_key_exists('organized', $data)) {
            $self->organized = $data['organized'];
        }

        return $self;
    }
}
