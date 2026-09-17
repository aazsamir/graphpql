<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class Version implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?string $version;
    public string $hash;
    public string $build_time;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\VersionField<mixed>
     */
    public static function version(): Fields\VersionField
    {
        return \Tests\Feature\Fixture\Stash\Fields\VersionField::version();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\VersionField<mixed>
     */
    public static function hash(): Fields\VersionField
    {
        return \Tests\Feature\Fixture\Stash\Fields\VersionField::hash();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\VersionField<mixed>
     */
    public static function build_time(): Fields\VersionField
    {
        return \Tests\Feature\Fixture\Stash\Fields\VersionField::build_time();
    }

    public static function new(string $hash, string $build_time, ?string $version = null): self
    {
        $self = new self();
        $self->hash = $hash;
        $self->build_time = $build_time;
        $self->version = $version;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('hash', $data)) {
            $self->hash = $data['hash'];
        }
        if (array_key_exists('build_time', $data)) {
            $self->build_time = $data['build_time'];
        }
        if (array_key_exists('version', $data)) {
            $self->version = $data['version'];
        }

        return $self;
    }
}
