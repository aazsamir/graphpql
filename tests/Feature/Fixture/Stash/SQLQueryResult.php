<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class SQLQueryResult implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    /** @var array<string> */
    public array $columns;

    /** @var array<array<mixed>> */
    public array $rows;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SQLQueryResultField<mixed>
     */
    public static function columns(): Fields\SQLQueryResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SQLQueryResultField::columns();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SQLQueryResultField<mixed>
     */
    public static function rows(): Fields\SQLQueryResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SQLQueryResultField::rows();
    }

    /**
     * @param array<string> $columns
     * @param array<array<mixed>> $rows
     */
    public static function new(array $columns, array $rows): self
    {
        $self = new self();
        $self->columns = $columns;
        $self->rows = $rows;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('columns', $data)) {
            $self->columns = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['columns'] ?? []);
        }
        if (array_key_exists('rows', $data)) {
            $self->rows = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return array_map(function ($data) {
                    if ($data === []) {
                        return [];
                    }

                    return $data;
                }, $data ?? []);
            }, $data['rows'] ?? []);
        }

        return $self;
    }
}
