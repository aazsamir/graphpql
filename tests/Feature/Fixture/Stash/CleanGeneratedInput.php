<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class CleanGeneratedInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?bool $blobFiles;
    public ?bool $sprites;
    public ?bool $screenshots;
    public ?bool $transcodes;
    public ?bool $markers;
    public ?bool $imageThumbnails;
    public ?bool $dryRun;

    public static function new(
        ?bool $blobFiles = null,
        ?bool $sprites = null,
        ?bool $screenshots = null,
        ?bool $transcodes = null,
        ?bool $markers = null,
        ?bool $imageThumbnails = null,
        ?bool $dryRun = null,
    ): self {
        $self = new self();
        $self->blobFiles = $blobFiles;
        $self->sprites = $sprites;
        $self->screenshots = $screenshots;
        $self->transcodes = $transcodes;
        $self->markers = $markers;
        $self->imageThumbnails = $imageThumbnails;
        $self->dryRun = $dryRun;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('blobFiles', $data)) {
            $self->blobFiles = $data['blobFiles'];
        }
        if (array_key_exists('sprites', $data)) {
            $self->sprites = $data['sprites'];
        }
        if (array_key_exists('screenshots', $data)) {
            $self->screenshots = $data['screenshots'];
        }
        if (array_key_exists('transcodes', $data)) {
            $self->transcodes = $data['transcodes'];
        }
        if (array_key_exists('markers', $data)) {
            $self->markers = $data['markers'];
        }
        if (array_key_exists('imageThumbnails', $data)) {
            $self->imageThumbnails = $data['imageThumbnails'];
        }
        if (array_key_exists('dryRun', $data)) {
            $self->dryRun = $data['dryRun'];
        }

        return $self;
    }
}
