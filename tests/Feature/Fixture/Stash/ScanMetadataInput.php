<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ScanMetadataInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    /** @var array<string> */
    public ?array $paths;
    public ?bool $rescan;
    public ?bool $scanGenerateCovers;
    public ?bool $scanGeneratePreviews;
    public ?bool $scanGenerateImagePreviews;
    public ?bool $scanGenerateSprites;
    public ?bool $scanGeneratePhashes;
    public ?bool $scanGenerateImagePhashes;
    public ?bool $scanGenerateThumbnails;
    public ?bool $scanGenerateClipPreviews;
    public ?ScanMetaDataFilterInput $filter;

    /**
     * @param array<string> $paths
     */
    public static function new(
        ?array $paths = null,
        ?bool $rescan = null,
        ?bool $scanGenerateCovers = null,
        ?bool $scanGeneratePreviews = null,
        ?bool $scanGenerateImagePreviews = null,
        ?bool $scanGenerateSprites = null,
        ?bool $scanGeneratePhashes = null,
        ?bool $scanGenerateImagePhashes = null,
        ?bool $scanGenerateThumbnails = null,
        ?bool $scanGenerateClipPreviews = null,
        ?ScanMetaDataFilterInput $filter = null,
    ): self {
        $self = new self();
        $self->paths = $paths;
        $self->rescan = $rescan;
        $self->scanGenerateCovers = $scanGenerateCovers;
        $self->scanGeneratePreviews = $scanGeneratePreviews;
        $self->scanGenerateImagePreviews = $scanGenerateImagePreviews;
        $self->scanGenerateSprites = $scanGenerateSprites;
        $self->scanGeneratePhashes = $scanGeneratePhashes;
        $self->scanGenerateImagePhashes = $scanGenerateImagePhashes;
        $self->scanGenerateThumbnails = $scanGenerateThumbnails;
        $self->scanGenerateClipPreviews = $scanGenerateClipPreviews;
        $self->filter = $filter;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('paths', $data)) {
            $self->paths = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['paths'] ?? []);
        }
        if (array_key_exists('rescan', $data)) {
            $self->rescan = $data['rescan'];
        }
        if (array_key_exists('scanGenerateCovers', $data)) {
            $self->scanGenerateCovers = $data['scanGenerateCovers'];
        }
        if (array_key_exists('scanGeneratePreviews', $data)) {
            $self->scanGeneratePreviews = $data['scanGeneratePreviews'];
        }
        if (array_key_exists('scanGenerateImagePreviews', $data)) {
            $self->scanGenerateImagePreviews = $data['scanGenerateImagePreviews'];
        }
        if (array_key_exists('scanGenerateSprites', $data)) {
            $self->scanGenerateSprites = $data['scanGenerateSprites'];
        }
        if (array_key_exists('scanGeneratePhashes', $data)) {
            $self->scanGeneratePhashes = $data['scanGeneratePhashes'];
        }
        if (array_key_exists('scanGenerateImagePhashes', $data)) {
            $self->scanGenerateImagePhashes = $data['scanGenerateImagePhashes'];
        }
        if (array_key_exists('scanGenerateThumbnails', $data)) {
            $self->scanGenerateThumbnails = $data['scanGenerateThumbnails'];
        }
        if (array_key_exists('scanGenerateClipPreviews', $data)) {
            $self->scanGenerateClipPreviews = $data['scanGenerateClipPreviews'];
        }
        if (array_key_exists('filter', $data)) {
            $self->filter = \Tests\Feature\Fixture\Stash\ScanMetaDataFilterInput::fromArray($data['filter']);
        }

        return $self;
    }
}
