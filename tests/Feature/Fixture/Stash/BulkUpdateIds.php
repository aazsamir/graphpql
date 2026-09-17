<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class BulkUpdateIds implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    /** @var array<string> */
    public ?array $ids;
    public BulkUpdateIdMode $mode;

    /**
     * @param array<string> $ids
     */
    public static function new(BulkUpdateIdMode $mode, ?array $ids = null): self
    {
        $self = new self();
        $self->mode = $mode;
        $self->ids = $ids;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('mode', $data)) {
            $self->mode = \Tests\Feature\Fixture\Stash\BulkUpdateIdMode::from($data['mode']);
        }
        if (array_key_exists('ids', $data)) {
            $self->ids = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['ids'] ?? []);
        }

        return $self;
    }
}
