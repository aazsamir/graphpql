<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class StashIDCriterionInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?string $endpoint;
    public ?string $stash_id;
    public CriterionModifier $modifier;

    public static function new(CriterionModifier $modifier, ?string $endpoint = null, ?string $stash_id = null): self
    {
        $self = new self();
        $self->modifier = $modifier;
        $self->endpoint = $endpoint;
        $self->stash_id = $stash_id;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('modifier', $data)) {
            $self->modifier = \Tests\Feature\Fixture\Stash\CriterionModifier::from($data['modifier']);
        }
        if (array_key_exists('endpoint', $data)) {
            $self->endpoint = $data['endpoint'];
        }
        if (array_key_exists('stash_id', $data)) {
            $self->stash_id = $data['stash_id'];
        }

        return $self;
    }
}
