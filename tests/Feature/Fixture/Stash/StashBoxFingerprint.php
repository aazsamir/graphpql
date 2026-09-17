<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class StashBoxFingerprint implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $algorithm;
    public string $hash;
    public int $duration;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StashBoxFingerprintField<mixed>
     */
    public static function algorithm(): Fields\StashBoxFingerprintField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StashBoxFingerprintField::algorithm();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StashBoxFingerprintField<mixed>
     */
    public static function hash(): Fields\StashBoxFingerprintField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StashBoxFingerprintField::hash();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StashBoxFingerprintField<mixed>
     */
    public static function duration(): Fields\StashBoxFingerprintField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StashBoxFingerprintField::duration();
    }

    public static function new(string $algorithm, string $hash, int $duration): self
    {
        $self = new self();
        $self->algorithm = $algorithm;
        $self->hash = $hash;
        $self->duration = $duration;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('algorithm', $data)) {
            $self->algorithm = $data['algorithm'];
        }
        if (array_key_exists('hash', $data)) {
            $self->hash = $data['hash'];
        }
        if (array_key_exists('duration', $data)) {
            $self->duration = $data['duration'];
        }

        return $self;
    }
}
