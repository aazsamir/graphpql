<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class StashConfigInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $path;
    public bool $excludeVideo;
    public bool $excludeImage;

    public static function new(string $path, bool $excludeVideo, bool $excludeImage): self
    {
        $self = new self();
        $self->path = $path;
        $self->excludeVideo = $excludeVideo;
        $self->excludeImage = $excludeImage;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('path', $data)) {
            $self->path = $data['path'];
        }
        if (array_key_exists('excludeVideo', $data)) {
            $self->excludeVideo = $data['excludeVideo'];
        }
        if (array_key_exists('excludeImage', $data)) {
            $self->excludeImage = $data['excludeImage'];
        }

        return $self;
    }
}
