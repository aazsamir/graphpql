<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class GenerateMetadataOptions implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?bool $covers;
    public ?bool $sprites;
    public ?bool $previews;
    public ?bool $imagePreviews;
    public ?GeneratePreviewOptions $previewOptions;
    public ?bool $markers;
    public ?bool $markerImagePreviews;
    public ?bool $markerScreenshots;
    public ?bool $transcodes;
    public ?bool $phashes;
    public ?bool $interactiveHeatmapsSpeeds;
    public ?bool $imageThumbnails;
    public ?bool $clipPreviews;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GenerateMetadataOptionsField<mixed>
     */
    public static function covers(): Fields\GenerateMetadataOptionsField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GenerateMetadataOptionsField::covers();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GenerateMetadataOptionsField<mixed>
     */
    public static function sprites(): Fields\GenerateMetadataOptionsField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GenerateMetadataOptionsField::sprites();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GenerateMetadataOptionsField<mixed>
     */
    public static function previews(): Fields\GenerateMetadataOptionsField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GenerateMetadataOptionsField::previews();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GenerateMetadataOptionsField<mixed>
     */
    public static function imagePreviews(): Fields\GenerateMetadataOptionsField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GenerateMetadataOptionsField::imagePreviews();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GenerateMetadataOptionsField<\Tests\Feature\Fixture\Stash\SelectionSet\GeneratePreviewOptionsSelectionSet>
     */
    public static function previewOptions(): Fields\GenerateMetadataOptionsField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GenerateMetadataOptionsField::previewOptions();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GenerateMetadataOptionsField<mixed>
     */
    public static function markers(): Fields\GenerateMetadataOptionsField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GenerateMetadataOptionsField::markers();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GenerateMetadataOptionsField<mixed>
     */
    public static function markerImagePreviews(): Fields\GenerateMetadataOptionsField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GenerateMetadataOptionsField::markerImagePreviews();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GenerateMetadataOptionsField<mixed>
     */
    public static function markerScreenshots(): Fields\GenerateMetadataOptionsField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GenerateMetadataOptionsField::markerScreenshots();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GenerateMetadataOptionsField<mixed>
     */
    public static function transcodes(): Fields\GenerateMetadataOptionsField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GenerateMetadataOptionsField::transcodes();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GenerateMetadataOptionsField<mixed>
     */
    public static function phashes(): Fields\GenerateMetadataOptionsField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GenerateMetadataOptionsField::phashes();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GenerateMetadataOptionsField<mixed>
     */
    public static function interactiveHeatmapsSpeeds(): Fields\GenerateMetadataOptionsField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GenerateMetadataOptionsField::interactiveHeatmapsSpeeds();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GenerateMetadataOptionsField<mixed>
     */
    public static function imageThumbnails(): Fields\GenerateMetadataOptionsField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GenerateMetadataOptionsField::imageThumbnails();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GenerateMetadataOptionsField<mixed>
     */
    public static function clipPreviews(): Fields\GenerateMetadataOptionsField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GenerateMetadataOptionsField::clipPreviews();
    }

    public static function new(
        ?bool $covers = null,
        ?bool $sprites = null,
        ?bool $previews = null,
        ?bool $imagePreviews = null,
        ?GeneratePreviewOptions $previewOptions = null,
        ?bool $markers = null,
        ?bool $markerImagePreviews = null,
        ?bool $markerScreenshots = null,
        ?bool $transcodes = null,
        ?bool $phashes = null,
        ?bool $interactiveHeatmapsSpeeds = null,
        ?bool $imageThumbnails = null,
        ?bool $clipPreviews = null,
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
        $self->phashes = $phashes;
        $self->interactiveHeatmapsSpeeds = $interactiveHeatmapsSpeeds;
        $self->imageThumbnails = $imageThumbnails;
        $self->clipPreviews = $clipPreviews;

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
            $self->previewOptions = \Tests\Feature\Fixture\Stash\GeneratePreviewOptions::fromArray($data['previewOptions']);
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
        if (array_key_exists('phashes', $data)) {
            $self->phashes = $data['phashes'];
        }
        if (array_key_exists('interactiveHeatmapsSpeeds', $data)) {
            $self->interactiveHeatmapsSpeeds = $data['interactiveHeatmapsSpeeds'];
        }
        if (array_key_exists('imageThumbnails', $data)) {
            $self->imageThumbnails = $data['imageThumbnails'];
        }
        if (array_key_exists('clipPreviews', $data)) {
            $self->clipPreviews = $data['clipPreviews'];
        }

        return $self;
    }
}
