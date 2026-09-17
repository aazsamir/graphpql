<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class GenderCriterionInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?GenderEnum $value;

    /** @var array<\Tests\Feature\Fixture\Stash\GenderEnum> */
    public ?array $value_list;
    public CriterionModifier $modifier;

    /**
     * @param array<\Tests\Feature\Fixture\Stash\GenderEnum> $value_list
     */
    public static function new(
        CriterionModifier $modifier,
        ?GenderEnum $value = null,
        ?array $value_list = null,
    ): self {
        $self = new self();
        $self->modifier = $modifier;
        $self->value = $value;
        $self->value_list = $value_list;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('modifier', $data)) {
            $self->modifier = \Tests\Feature\Fixture\Stash\CriterionModifier::from($data['modifier']);
        }
        if (array_key_exists('value', $data)) {
            $self->value = \Tests\Feature\Fixture\Stash\GenderEnum::from($data['value']);
        }
        if (array_key_exists('value_list', $data)) {
            $self->value_list = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\GenderEnum::from($data);
            }, $data['value_list'] ?? []);
        }

        return $self;
    }
}
