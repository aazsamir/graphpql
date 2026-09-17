<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class SetFingerprintsInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $type;
    public ?string $value;

    public static function new(string $type, ?string $value = null): self
    {
        $self = new self();
        $self->type = $type;
        $self->value = $value;

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

        return $self;
    }
}
