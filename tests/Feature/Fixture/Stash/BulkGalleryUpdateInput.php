<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class BulkGalleryUpdateInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?string $clientMutationId;

    /** @var array<string> */
    public ?array $ids;
    public ?string $code;
    public ?string $url;
    public ?BulkUpdateStrings $urls;
    public ?string $date;
    public ?string $details;
    public ?string $photographer;
    public ?int $rating100;
    public ?bool $organized;
    public ?BulkUpdateIds $scene_ids;
    public ?string $studio_id;
    public ?BulkUpdateIds $tag_ids;
    public ?BulkUpdateIds $performer_ids;
    public ?CustomFieldsInput $custom_fields;

    /**
     * @param array<string> $ids
     */
    public static function new(
        ?string $clientMutationId = null,
        ?array $ids = null,
        ?string $code = null,
        ?string $url = null,
        ?BulkUpdateStrings $urls = null,
        ?string $date = null,
        ?string $details = null,
        ?string $photographer = null,
        ?int $rating100 = null,
        ?bool $organized = null,
        ?BulkUpdateIds $scene_ids = null,
        ?string $studio_id = null,
        ?BulkUpdateIds $tag_ids = null,
        ?BulkUpdateIds $performer_ids = null,
        ?CustomFieldsInput $custom_fields = null,
    ): self {
        $self = new self();
        $self->clientMutationId = $clientMutationId;
        $self->ids = $ids;
        $self->code = $code;
        $self->url = $url;
        $self->urls = $urls;
        $self->date = $date;
        $self->details = $details;
        $self->photographer = $photographer;
        $self->rating100 = $rating100;
        $self->organized = $organized;
        $self->scene_ids = $scene_ids;
        $self->studio_id = $studio_id;
        $self->tag_ids = $tag_ids;
        $self->performer_ids = $performer_ids;
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
        if (array_key_exists('code', $data)) {
            $self->code = $data['code'];
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
        if (array_key_exists('rating100', $data)) {
            $self->rating100 = $data['rating100'];
        }
        if (array_key_exists('organized', $data)) {
            $self->organized = $data['organized'];
        }
        if (array_key_exists('scene_ids', $data)) {
            $self->scene_ids = \Tests\Feature\Fixture\Stash\BulkUpdateIds::fromArray($data['scene_ids']);
        }
        if (array_key_exists('studio_id', $data)) {
            $self->studio_id = $data['studio_id'];
        }
        if (array_key_exists('tag_ids', $data)) {
            $self->tag_ids = \Tests\Feature\Fixture\Stash\BulkUpdateIds::fromArray($data['tag_ids']);
        }
        if (array_key_exists('performer_ids', $data)) {
            $self->performer_ids = \Tests\Feature\Fixture\Stash\BulkUpdateIds::fromArray($data['performer_ids']);
        }
        if (array_key_exists('custom_fields', $data)) {
            $self->custom_fields = \Tests\Feature\Fixture\Stash\CustomFieldsInput::fromArray($data['custom_fields']);
        }

        return $self;
    }
}
