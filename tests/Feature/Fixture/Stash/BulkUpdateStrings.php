<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class BulkUpdateStrings implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    /** @var array<string> */
    public ?array $values;
    public BulkUpdateIdMode $mode;

    /**
     * @param array<string> $values
     */
    public static function new(BulkUpdateIdMode $mode, ?array $values = null): self
    {
        $self = new self();
        $self->mode = $mode;
        $self->values = $values;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('mode', $data)) {
            $self->mode = \Tests\Feature\Fixture\Stash\BulkUpdateIdMode::from($data['mode']);
        }
        if (array_key_exists('values', $data)) {
            $self->values = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['values'] ?? []);
        }

        return $self;
    }
}
