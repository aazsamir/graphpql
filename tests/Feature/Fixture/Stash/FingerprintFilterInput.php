<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class FingerprintFilterInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $type;
    public string $value;
    public ?int $distance;

    public static function new(string $type, string $value, ?int $distance = null): self
    {
        $self = new self();
        $self->type = $type;
        $self->value = $value;
        $self->distance = $distance;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('type', $data)) {
            $self->type = $data['type'];
        }
        if (array_key_exists('value', $data)) {
            $self->value = $data['value'];
        }
        if (array_key_exists('distance', $data)) {
            $self->distance = $data['distance'];
        }

        return $self;
    }
}
