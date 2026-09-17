<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class CircumcisionCriterionInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    /** @var array<\Tests\Feature\Fixture\Stash\CircumcisedEnum> */
    public ?array $value;
    public CriterionModifier $modifier;

    /**
     * @param array<\Tests\Feature\Fixture\Stash\CircumcisedEnum> $value
     */
    public static function new(CriterionModifier $modifier, ?array $value = null): self
    {
        $self = new self();
        $self->modifier = $modifier;
        $self->value = $value;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('modifier', $data)) {
            $self->modifier = \Tests\Feature\Fixture\Stash\CriterionModifier::from($data['modifier']);
        }
        if (array_key_exists('value', $data)) {
            $self->value = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\CircumcisedEnum::from($data);
            }, $data['value'] ?? []);
        }

        return $self;
    }
}
