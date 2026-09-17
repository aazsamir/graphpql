<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class LatestVersion implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $version;
    public string $shorthash;
    public string $release_date;
    public string $url;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\LatestVersionField<mixed>
     */
    public static function version(): Fields\LatestVersionField
    {
        return \Tests\Feature\Fixture\Stash\Fields\LatestVersionField::version();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\LatestVersionField<mixed>
     */
    public static function shorthash(): Fields\LatestVersionField
    {
        return \Tests\Feature\Fixture\Stash\Fields\LatestVersionField::shorthash();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\LatestVersionField<mixed>
     */
    public static function release_date(): Fields\LatestVersionField
    {
        return \Tests\Feature\Fixture\Stash\Fields\LatestVersionField::release_date();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\LatestVersionField<mixed>
     */
    public static function url(): Fields\LatestVersionField
    {
        return \Tests\Feature\Fixture\Stash\Fields\LatestVersionField::url();
    }

    public static function new(string $version, string $shorthash, string $release_date, string $url): self
    {
        $self = new self();
        $self->version = $version;
        $self->shorthash = $shorthash;
        $self->release_date = $release_date;
        $self->url = $url;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('version', $data)) {
            $self->version = $data['version'];
        }
        if (array_key_exists('shorthash', $data)) {
            $self->shorthash = $data['shorthash'];
        }
        if (array_key_exists('release_date', $data)) {
            $self->release_date = $data['release_date'];
        }
        if (array_key_exists('url', $data)) {
            $self->url = $data['url'];
        }

        return $self;
    }
}
