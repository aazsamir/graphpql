<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class MigrateSceneScreenshotsInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?bool $deleteFiles;
    public ?bool $overwriteExisting;

    public static function new(?bool $deleteFiles = null, ?bool $overwriteExisting = null): self
    {
        $self = new self();
        $self->deleteFiles = $deleteFiles;
        $self->overwriteExisting = $overwriteExisting;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('deleteFiles', $data)) {
            $self->deleteFiles = $data['deleteFiles'];
        }
        if (array_key_exists('overwriteExisting', $data)) {
            $self->overwriteExisting = $data['overwriteExisting'];
        }

        return $self;
    }
}
