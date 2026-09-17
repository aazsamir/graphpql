<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class SceneFileType implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?string $size;
    public ?float $duration;
    public ?string $video_codec;
    public ?string $audio_codec;
    public ?int $width;
    public ?int $height;
    public ?float $framerate;
    public ?int $bitrate;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneFileTypeField<mixed>
     */
    public static function size(): Fields\SceneFileTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneFileTypeField::size();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneFileTypeField<mixed>
     */
    public static function duration(): Fields\SceneFileTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneFileTypeField::duration();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneFileTypeField<mixed>
     */
    public static function video_codec(): Fields\SceneFileTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneFileTypeField::video_codec();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneFileTypeField<mixed>
     */
    public static function audio_codec(): Fields\SceneFileTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneFileTypeField::audio_codec();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneFileTypeField<mixed>
     */
    public static function width(): Fields\SceneFileTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneFileTypeField::width();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneFileTypeField<mixed>
     */
    public static function height(): Fields\SceneFileTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneFileTypeField::height();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneFileTypeField<mixed>
     */
    public static function framerate(): Fields\SceneFileTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneFileTypeField::framerate();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneFileTypeField<mixed>
     */
    public static function bitrate(): Fields\SceneFileTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneFileTypeField::bitrate();
    }

    public static function new(
        ?string $size = null,
        ?float $duration = null,
        ?string $video_codec = null,
        ?string $audio_codec = null,
        ?int $width = null,
        ?int $height = null,
        ?float $framerate = null,
        ?int $bitrate = null,
    ): self {
        $self = new self();
        $self->size = $size;
        $self->duration = $duration;
        $self->video_codec = $video_codec;
        $self->audio_codec = $audio_codec;
        $self->width = $width;
        $self->height = $height;
        $self->framerate = $framerate;
        $self->bitrate = $bitrate;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('size', $data)) {
            $self->size = $data['size'];
        }
        if (array_key_exists('duration', $data)) {
            $self->duration = $data['duration'];
        }
        if (array_key_exists('video_codec', $data)) {
            $self->video_codec = $data['video_codec'];
        }
        if (array_key_exists('audio_codec', $data)) {
            $self->audio_codec = $data['audio_codec'];
        }
        if (array_key_exists('width', $data)) {
            $self->width = $data['width'];
        }
        if (array_key_exists('height', $data)) {
            $self->height = $data['height'];
        }
        if (array_key_exists('framerate', $data)) {
            $self->framerate = $data['framerate'];
        }
        if (array_key_exists('bitrate', $data)) {
            $self->bitrate = $data['bitrate'];
        }

        return $self;
    }
}
