<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class PhashDistanceCriterionInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $value;
    public CriterionModifier $modifier;
    public ?int $distance;

    public static function new(string $value, CriterionModifier $modifier, ?int $distance = null): self
    {
        $self = new self();
        $self->value = $value;
        $self->modifier = $modifier;
        $self->distance = $distance;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('value', $data)) {
            $self->value = $data['value'];
        }
        if (array_key_exists('modifier', $data)) {
            $self->modifier = \Tests\Feature\Fixture\Stash\CriterionModifier::from($data['modifier']);
        }
        if (array_key_exists('distance', $data)) {
            $self->distance = $data['distance'];
        }

        return $self;
    }
}
