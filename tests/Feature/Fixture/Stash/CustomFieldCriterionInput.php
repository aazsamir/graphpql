<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class CustomFieldCriterionInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $field;

    /** @var array<mixed> */
    public ?array $value;
    public CriterionModifier $modifier;

    /**
     * @param array<mixed> $value
     */
    public static function new(string $field, CriterionModifier $modifier, ?array $value = null): self
    {
        $self = new self();
        $self->field = $field;
        $self->modifier = $modifier;
        $self->value = $value;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('field', $data)) {
            $self->field = $data['field'];
        }
        if (array_key_exists('modifier', $data)) {
            $self->modifier = \Tests\Feature\Fixture\Stash\CriterionModifier::from($data['modifier']);
        }
        if (array_key_exists('value', $data)) {
            $self->value = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['value'] ?? []);
        }

        return $self;
    }
}
