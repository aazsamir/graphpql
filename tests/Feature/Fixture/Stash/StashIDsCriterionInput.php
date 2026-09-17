<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class StashIDsCriterionInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?string $endpoint;

    /** @var array<string> */
    public ?array $stash_ids;
    public CriterionModifier $modifier;

    /**
     * @param array<string> $stash_ids
     */
    public static function new(CriterionModifier $modifier, ?string $endpoint = null, ?array $stash_ids = null): self
    {
        $self = new self();
        $self->modifier = $modifier;
        $self->endpoint = $endpoint;
        $self->stash_ids = $stash_ids;

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
        if (array_key_exists('stash_ids', $data)) {
            $self->stash_ids = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['stash_ids'] ?? []);
        }

        return $self;
    }
}
