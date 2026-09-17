<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class SetupInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $configLocation;

    /** @var array<\Tests\Feature\Fixture\Stash\StashConfigInput> */
    public array $stashes;
    public ?bool $sfwContentMode;
    public string $databaseFile;
    public string $generatedLocation;
    public string $cacheLocation;
    public bool $storeBlobsInDatabase;
    public string $blobsLocation;

    /**
     * @param array<\Tests\Feature\Fixture\Stash\StashConfigInput> $stashes
     */
    public static function new(
        string $configLocation,
        array $stashes,
        string $databaseFile,
        string $generatedLocation,
        string $cacheLocation,
        bool $storeBlobsInDatabase,
        string $blobsLocation,
        ?bool $sfwContentMode = null,
    ): self {
        $self = new self();
        $self->configLocation = $configLocation;
        $self->stashes = $stashes;
        $self->databaseFile = $databaseFile;
        $self->generatedLocation = $generatedLocation;
        $self->cacheLocation = $cacheLocation;
        $self->storeBlobsInDatabase = $storeBlobsInDatabase;
        $self->blobsLocation = $blobsLocation;
        $self->sfwContentMode = $sfwContentMode;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('configLocation', $data)) {
            $self->configLocation = $data['configLocation'];
        }
        if (array_key_exists('stashes', $data)) {
            $self->stashes = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\StashConfigInput::fromArray($data);
            }, $data['stashes'] ?? []);
        }
        if (array_key_exists('databaseFile', $data)) {
            $self->databaseFile = $data['databaseFile'];
        }
        if (array_key_exists('generatedLocation', $data)) {
            $self->generatedLocation = $data['generatedLocation'];
        }
        if (array_key_exists('cacheLocation', $data)) {
            $self->cacheLocation = $data['cacheLocation'];
        }
        if (array_key_exists('storeBlobsInDatabase', $data)) {
            $self->storeBlobsInDatabase = $data['storeBlobsInDatabase'];
        }
        if (array_key_exists('blobsLocation', $data)) {
            $self->blobsLocation = $data['blobsLocation'];
        }
        if (array_key_exists('sfwContentMode', $data)) {
            $self->sfwContentMode = $data['sfwContentMode'];
        }

        return $self;
    }
}
