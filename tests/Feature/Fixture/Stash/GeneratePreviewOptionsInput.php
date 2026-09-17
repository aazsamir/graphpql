<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class GeneratePreviewOptionsInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?int $previewSegments;
    public ?float $previewSegmentDuration;
    public ?string $previewExcludeStart;
    public ?string $previewExcludeEnd;
    public ?PreviewPreset $previewPreset;

    public static function new(
        ?int $previewSegments = null,
        ?float $previewSegmentDuration = null,
        ?string $previewExcludeStart = null,
        ?string $previewExcludeEnd = null,
        ?PreviewPreset $previewPreset = null,
    ): self {
        $self = new self();
        $self->previewSegments = $previewSegments;
        $self->previewSegmentDuration = $previewSegmentDuration;
        $self->previewExcludeStart = $previewExcludeStart;
        $self->previewExcludeEnd = $previewExcludeEnd;
        $self->previewPreset = $previewPreset;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('previewSegments', $data)) {
            $self->previewSegments = $data['previewSegments'];
        }
        if (array_key_exists('previewSegmentDuration', $data)) {
            $self->previewSegmentDuration = $data['previewSegmentDuration'];
        }
        if (array_key_exists('previewExcludeStart', $data)) {
            $self->previewExcludeStart = $data['previewExcludeStart'];
        }
        if (array_key_exists('previewExcludeEnd', $data)) {
            $self->previewExcludeEnd = $data['previewExcludeEnd'];
        }
        if (array_key_exists('previewPreset', $data)) {
            $self->previewPreset = \Tests\Feature\Fixture\Stash\PreviewPreset::from($data['previewPreset']);
        }

        return $self;
    }
}
