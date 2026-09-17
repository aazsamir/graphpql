<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class StashBoxInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $endpoint;
    public string $api_key;
    public string $name;
    public ?int $max_requests_per_minute;

    public static function new(
        string $endpoint,
        string $api_key,
        string $name,
        ?int $max_requests_per_minute = null,
    ): self {
        $self = new self();
        $self->endpoint = $endpoint;
        $self->api_key = $api_key;
        $self->name = $name;
        $self->max_requests_per_minute = $max_requests_per_minute;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('endpoint', $data)) {
            $self->endpoint = $data['endpoint'];
        }
        if (array_key_exists('api_key', $data)) {
            $self->api_key = $data['api_key'];
        }
        if (array_key_exists('name', $data)) {
            $self->name = $data['name'];
        }
        if (array_key_exists('max_requests_per_minute', $data)) {
            $self->max_requests_per_minute = $data['max_requests_per_minute'];
        }

        return $self;
    }
}
