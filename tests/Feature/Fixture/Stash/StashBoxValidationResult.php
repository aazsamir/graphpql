<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class StashBoxValidationResult implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public bool $valid;
    public string $status;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StashBoxValidationResultField<mixed>
     */
    public static function valid(): Fields\StashBoxValidationResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StashBoxValidationResultField::valid();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StashBoxValidationResultField<mixed>
     */
    public static function status(): Fields\StashBoxValidationResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StashBoxValidationResultField::status();
    }

    public static function new(bool $valid, string $status): self
    {
        $self = new self();
        $self->valid = $valid;
        $self->status = $status;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('valid', $data)) {
            $self->valid = $data['valid'];
        }
        if (array_key_exists('status', $data)) {
            $self->status = $data['status'];
        }

        return $self;
    }
}
