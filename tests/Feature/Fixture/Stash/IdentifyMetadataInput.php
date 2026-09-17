<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class IdentifyMetadataInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    /** @var array<\Tests\Feature\Fixture\Stash\IdentifySourceInput> */
    public array $sources;
    public ?IdentifyMetadataOptionsInput $options;

    /** @var array<string> */
    public ?array $sceneIDs;

    /** @var array<string> */
    public ?array $paths;

    /**
     * @param array<\Tests\Feature\Fixture\Stash\IdentifySourceInput> $sources
     * @param array<string> $sceneIDs
     * @param array<string> $paths
     */
    public static function new(
        array $sources,
        ?IdentifyMetadataOptionsInput $options = null,
        ?array $sceneIDs = null,
        ?array $paths = null,
    ): self {
        $self = new self();
        $self->sources = $sources;
        $self->options = $options;
        $self->sceneIDs = $sceneIDs;
        $self->paths = $paths;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('sources', $data)) {
            $self->sources = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\IdentifySourceInput::fromArray($data);
            }, $data['sources'] ?? []);
        }
        if (array_key_exists('options', $data)) {
            $self->options = \Tests\Feature\Fixture\Stash\IdentifyMetadataOptionsInput::fromArray($data['options']);
        }
        if (array_key_exists('sceneIDs', $data)) {
            $self->sceneIDs = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['sceneIDs'] ?? []);
        }
        if (array_key_exists('paths', $data)) {
            $self->paths = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['paths'] ?? []);
        }

        return $self;
    }
}
