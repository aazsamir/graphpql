<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class BulkImageUpdateInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?string $clientMutationId;

    /** @var array<string> */
    public ?array $ids;
    public ?string $title;
    public ?string $code;
    public ?int $rating100;
    public ?bool $organized;
    public ?string $url;
    public ?BulkUpdateStrings $urls;
    public ?string $date;
    public ?string $details;
    public ?string $photographer;
    public ?string $studio_id;
    public ?BulkUpdateIds $performer_ids;
    public ?BulkUpdateIds $tag_ids;
    public ?BulkUpdateIds $gallery_ids;
    public ?CustomFieldsInput $custom_fields;

    /**
     * @param array<string> $ids
     */
    public static function new(
        ?string $clientMutationId = null,
        ?array $ids = null,
        ?string $title = null,
        ?string $code = null,
        ?int $rating100 = null,
        ?bool $organized = null,
        ?string $url = null,
        ?BulkUpdateStrings $urls = null,
        ?string $date = null,
        ?string $details = null,
        ?string $photographer = null,
        ?string $studio_id = null,
        ?BulkUpdateIds $performer_ids = null,
        ?BulkUpdateIds $tag_ids = null,
        ?BulkUpdateIds $gallery_ids = null,
        ?CustomFieldsInput $custom_fields = null,
    ): self {
        $self = new self();
        $self->clientMutationId = $clientMutationId;
        $self->ids = $ids;
        $self->title = $title;
        $self->code = $code;
        $self->rating100 = $rating100;
        $self->organized = $organized;
        $self->url = $url;
        $self->urls = $urls;
        $self->date = $date;
        $self->details = $details;
        $self->photographer = $photographer;
        $self->studio_id = $studio_id;
        $self->performer_ids = $performer_ids;
        $self->tag_ids = $tag_ids;
        $self->gallery_ids = $gallery_ids;
        $self->custom_fields = $custom_fields;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('clientMutationId', $data)) {
            $self->clientMutationId = $data['clientMutationId'];
        }
        if (array_key_exists('ids', $data)) {
            $self->ids = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['ids'] ?? []);
        }
        if (array_key_exists('title', $data)) {
            $self->title = $data['title'];
        }
        if (array_key_exists('code', $data)) {
            $self->code = $data['code'];
        }
        if (array_key_exists('rating100', $data)) {
            $self->rating100 = $data['rating100'];
        }
        if (array_key_exists('organized', $data)) {
            $self->organized = $data['organized'];
        }
        if (array_key_exists('url', $data)) {
            $self->url = $data['url'];
        }
        if (array_key_exists('urls', $data)) {
            $self->urls = \Tests\Feature\Fixture\Stash\BulkUpdateStrings::fromArray($data['urls']);
        }
        if (array_key_exists('date', $data)) {
            $self->date = $data['date'];
        }
        if (array_key_exists('details', $data)) {
            $self->details = $data['details'];
        }
        if (array_key_exists('photographer', $data)) {
            $self->photographer = $data['photographer'];
        }
        if (array_key_exists('studio_id', $data)) {
            $self->studio_id = $data['studio_id'];
        }
        if (array_key_exists('performer_ids', $data)) {
            $self->performer_ids = \Tests\Feature\Fixture\Stash\BulkUpdateIds::fromArray($data['performer_ids']);
        }
        if (array_key_exists('tag_ids', $data)) {
            $self->tag_ids = \Tests\Feature\Fixture\Stash\BulkUpdateIds::fromArray($data['tag_ids']);
        }
        if (array_key_exists('gallery_ids', $data)) {
            $self->gallery_ids = \Tests\Feature\Fixture\Stash\BulkUpdateIds::fromArray($data['gallery_ids']);
        }
        if (array_key_exists('custom_fields', $data)) {
            $self->custom_fields = \Tests\Feature\Fixture\Stash\CustomFieldsInput::fromArray($data['custom_fields']);
        }

        return $self;
    }
}
