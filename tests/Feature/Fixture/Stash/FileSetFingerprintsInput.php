<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class FileSetFingerprintsInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $id;

    /** @var array<\Tests\Feature\Fixture\Stash\SetFingerprintsInput> */
    public array $fingerprints;

    /**
     * @param array<\Tests\Feature\Fixture\Stash\SetFingerprintsInput> $fingerprints
     */
    public static function new(string $id, array $fingerprints): self
    {
        $self = new self();
        $self->id = $id;
        $self->fingerprints = $fingerprints;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('id', $data)) {
            $self->id = $data['id'];
        }
        if (array_key_exists('fingerprints', $data)) {
            $self->fingerprints = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\SetFingerprintsInput::fromArray($data);
            }, $data['fingerprints'] ?? []);
        }

        return $self;
    }
}
