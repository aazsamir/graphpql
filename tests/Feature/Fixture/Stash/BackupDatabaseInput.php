<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class BackupDatabaseInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?bool $download;
    public ?bool $includeBlobs;

    public static function new(?bool $download = null, ?bool $includeBlobs = null): self
    {
        $self = new self();
        $self->download = $download;
        $self->includeBlobs = $includeBlobs;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('download', $data)) {
            $self->download = $data['download'];
        }
        if (array_key_exists('includeBlobs', $data)) {
            $self->includeBlobs = $data['includeBlobs'];
        }

        return $self;
    }
}
