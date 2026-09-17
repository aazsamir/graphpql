<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class SQLExecResult implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?int $rows_affected;
    public ?int $last_insert_id;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SQLExecResultField<mixed>
     */
    public static function rows_affected(): Fields\SQLExecResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SQLExecResultField::rows_affected();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SQLExecResultField<mixed>
     */
    public static function last_insert_id(): Fields\SQLExecResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SQLExecResultField::last_insert_id();
    }

    public static function new(?int $rows_affected = null, ?int $last_insert_id = null): self
    {
        $self = new self();
        $self->rows_affected = $rows_affected;
        $self->last_insert_id = $last_insert_id;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('rows_affected', $data)) {
            $self->rows_affected = $data['rows_affected'];
        }
        if (array_key_exists('last_insert_id', $data)) {
            $self->last_insert_id = $data['last_insert_id'];
        }

        return $self;
    }
}
