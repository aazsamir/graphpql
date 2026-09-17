<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class VideoFileFilterInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?ResolutionCriterionInput $resolution;
    public ?OrientationCriterionInput $orientation;
    public ?IntCriterionInput $framerate;
    public ?IntCriterionInput $bitrate;
    public ?StringCriterionInput $format;
    public ?StringCriterionInput $video_codec;
    public ?StringCriterionInput $audio_codec;
    public ?IntCriterionInput $duration;
    public ?StringCriterionInput $captions;
    public ?bool $interactive;
    public ?IntCriterionInput $interactive_speed;

    public static function new(
        ?ResolutionCriterionInput $resolution = null,
        ?OrientationCriterionInput $orientation = null,
        ?IntCriterionInput $framerate = null,
        ?IntCriterionInput $bitrate = null,
        ?StringCriterionInput $format = null,
        ?StringCriterionInput $video_codec = null,
        ?StringCriterionInput $audio_codec = null,
        ?IntCriterionInput $duration = null,
        ?StringCriterionInput $captions = null,
        ?bool $interactive = null,
        ?IntCriterionInput $interactive_speed = null,
    ): self {
        $self = new self();
        $self->resolution = $resolution;
        $self->orientation = $orientation;
        $self->framerate = $framerate;
        $self->bitrate = $bitrate;
        $self->format = $format;
        $self->video_codec = $video_codec;
        $self->audio_codec = $audio_codec;
        $self->duration = $duration;
        $self->captions = $captions;
        $self->interactive = $interactive;
        $self->interactive_speed = $interactive_speed;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('resolution', $data)) {
            $self->resolution = \Tests\Feature\Fixture\Stash\ResolutionCriterionInput::fromArray($data['resolution']);
        }
        if (array_key_exists('orientation', $data)) {
            $self->orientation = \Tests\Feature\Fixture\Stash\OrientationCriterionInput::fromArray($data['orientation']);
        }
        if (array_key_exists('framerate', $data)) {
            $self->framerate = \Tests\Feature\Fixture\Stash\IntCriterionInput::fromArray($data['framerate']);
        }
        if (array_key_exists('bitrate', $data)) {
            $self->bitrate = \Tests\Feature\Fixture\Stash\IntCriterionInput::fromArray($data['bitrate']);
        }
        if (array_key_exists('format', $data)) {
            $self->format = \Tests\Feature\Fixture\Stash\StringCriterionInput::fromArray($data['format']);
        }
        if (array_key_exists('video_codec', $data)) {
            $self->video_codec = \Tests\Feature\Fixture\Stash\StringCriterionInput::fromArray($data['video_codec']);
        }
        if (array_key_exists('audio_codec', $data)) {
            $self->audio_codec = \Tests\Feature\Fixture\Stash\StringCriterionInput::fromArray($data['audio_codec']);
        }
        if (array_key_exists('duration', $data)) {
            $self->duration = \Tests\Feature\Fixture\Stash\IntCriterionInput::fromArray($data['duration']);
        }
        if (array_key_exists('captions', $data)) {
            $self->captions = \Tests\Feature\Fixture\Stash\StringCriterionInput::fromArray($data['captions']);
        }
        if (array_key_exists('interactive', $data)) {
            $self->interactive = $data['interactive'];
        }
        if (array_key_exists('interactive_speed', $data)) {
            $self->interactive_speed = \Tests\Feature\Fixture\Stash\IntCriterionInput::fromArray($data['interactive_speed']);
        }

        return $self;
    }
}
