<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ResolutionCriterionInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ResolutionEnum $value;
    public CriterionModifier $modifier;

    public static function new(ResolutionEnum $value, CriterionModifier $modifier): self
    {
        $self = new self();
        $self->value = $value;
        $self->modifier = $modifier;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('value', $data)) {
            $self->value = \Tests\Feature\Fixture\Stash\ResolutionEnum::from($data['value']);
        }
        if (array_key_exists('modifier', $data)) {
            $self->modifier = \Tests\Feature\Fixture\Stash\CriterionModifier::from($data['modifier']);
        }

        return $self;
    }
}
