<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class MultiCriterionInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    /** @var array<string> */
    public ?array $value;
    public CriterionModifier $modifier;

    /** @var array<string> */
    public ?array $excludes;

    /**
     * @param array<string> $value
     * @param array<string> $excludes
     */
    public static function new(CriterionModifier $modifier, ?array $value = null, ?array $excludes = null): self
    {
        $self = new self();
        $self->modifier = $modifier;
        $self->value = $value;
        $self->excludes = $excludes;

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

                return $data;
            }, $data['value'] ?? []);
        }
        if (array_key_exists('excludes', $data)) {
            $self->excludes = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['excludes'] ?? []);
        }

        return $self;
    }
}
