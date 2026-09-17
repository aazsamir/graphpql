<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class GenerateMetadataInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?bool $covers;
    public ?bool $sprites;
    public ?bool $previews;
    public ?bool $imagePreviews;
    public ?GeneratePreviewOptionsInput $previewOptions;
    public ?bool $markers;
    public ?bool $markerImagePreviews;
    public ?bool $markerScreenshots;
    public ?bool $transcodes;
    public ?bool $forceTranscodes;
    public ?bool $phashes;
    public ?bool $interactiveHeatmapsSpeeds;
    public ?bool $imagePhashes;
    public ?bool $imageThumbnails;
    public ?bool $clipPreviews;

    /** @var array<string> */
    public ?array $sceneIDs;

    /** @var array<string> */
    public ?array $markerIDs;

    /** @var array<string> */
    public ?array $imageIDs;

    /** @var array<string> */
    public ?array $galleryIDs;

    /** @var array<string> */
    public ?array $paths;
    public ?bool $overwrite;

    /**
     * @param array<string> $sceneIDs
     * @param array<string> $markerIDs
     * @param array<string> $imageIDs
     * @param array<string> $galleryIDs
     * @param array<string> $paths
     */
    public static function new(
        ?bool $covers = null,
        ?bool $sprites = null,
        ?bool $previews = null,
        ?bool $imagePreviews = null,
        ?GeneratePreviewOptionsInput $previewOptions = null,
        ?bool $markers = null,
        ?bool $markerImagePreviews = null,
        ?bool $markerScreenshots = null,
        ?bool $transcodes = null,
        ?bool $forceTranscodes = null,
        ?bool $phashes = null,
        ?bool $interactiveHeatmapsSpeeds = null,
        ?bool $imagePhashes = null,
        ?bool $imageThumbnails = null,
        ?bool $clipPreviews = null,
        ?array $sceneIDs = null,
        ?array $markerIDs = null,
        ?array $imageIDs = null,
        ?array $galleryIDs = null,
        ?array $paths = null,
        ?bool $overwrite = null,
    ): self {
        $self = new self();
        $self->covers = $covers;
        $self->sprites = $sprites;
        $self->previews = $previews;
        $self->imagePreviews = $imagePreviews;
        $self->previewOptions = $previewOptions;
        $self->markers = $markers;
        $self->markerImagePreviews = $markerImagePreviews;
        $self->markerScreenshots = $markerScreenshots;
        $self->transcodes = $transcodes;
        $self->forceTranscodes = $forceTranscodes;
        $self->phashes = $phashes;
        $self->interactiveHeatmapsSpeeds = $interactiveHeatmapsSpeeds;
        $self->imagePhashes = $imagePhashes;
        $self->imageThumbnails = $imageThumbnails;
        $self->clipPreviews = $clipPreviews;
        $self->sceneIDs = $sceneIDs;
        $self->markerIDs = $markerIDs;
        $self->imageIDs = $imageIDs;
        $self->galleryIDs = $galleryIDs;
        $self->paths = $paths;
        $self->overwrite = $overwrite;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('covers', $data)) {
            $self->covers = $data['covers'];
        }
        if (array_key_exists('sprites', $data)) {
            $self->sprites = $data['sprites'];
        }
        if (array_key_exists('previews', $data)) {
            $self->previews = $data['previews'];
        }
        if (array_key_exists('imagePreviews', $data)) {
            $self->imagePreviews = $data['imagePreviews'];
        }
        if (array_key_exists('previewOptions', $data)) {
            $self->previewOptions = \Tests\Feature\Fixture\Stash\GeneratePreviewOptionsInput::fromArray($data['previewOptions']);
        }
        if (array_key_exists('markers', $data)) {
            $self->markers = $data['markers'];
        }
        if (array_key_exists('markerImagePreviews', $data)) {
            $self->markerImagePreviews = $data['markerImagePreviews'];
        }
        if (array_key_exists('markerScreenshots', $data)) {
            $self->markerScreenshots = $data['markerScreenshots'];
        }
        if (array_key_exists('transcodes', $data)) {
            $self->transcodes = $data['transcodes'];
        }
        if (array_key_exists('forceTranscodes', $data)) {
            $self->forceTranscodes = $data['forceTranscodes'];
        }
        if (array_key_exists('phashes', $data)) {
            $self->phashes = $data['phashes'];
        }
        if (array_key_exists('interactiveHeatmapsSpeeds', $data)) {
            $self->interactiveHeatmapsSpeeds = $data['interactiveHeatmapsSpeeds'];
        }
        if (array_key_exists('imagePhashes', $data)) {
            $self->imagePhashes = $data['imagePhashes'];
        }
        if (array_key_exists('imageThumbnails', $data)) {
            $self->imageThumbnails = $data['imageThumbnails'];
        }
        if (array_key_exists('clipPreviews', $data)) {
            $self->clipPreviews = $data['clipPreviews'];
        }
        if (array_key_exists('sceneIDs', $data)) {
            $self->sceneIDs = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['sceneIDs'] ?? []);
        }
        if (array_key_exists('markerIDs', $data)) {
            $self->markerIDs = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['markerIDs'] ?? []);
        }
        if (array_key_exists('imageIDs', $data)) {
            $self->imageIDs = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['imageIDs'] ?? []);
        }
        if (array_key_exists('galleryIDs', $data)) {
            $self->galleryIDs = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['galleryIDs'] ?? []);
        }
        if (array_key_exists('paths', $data)) {
            $self->paths = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['paths'] ?? []);
        }
        if (array_key_exists('overwrite', $data)) {
            $self->overwrite = $data['overwrite'];
        }

        return $self;
    }
}
