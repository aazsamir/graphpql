<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class CustomFieldsInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public mixed $full;
    public mixed $partial;

    /** @var array<string> */
    public ?array $remove;

    /**
     * @param array<string> $remove
     */
    public static function new(mixed $full = null, mixed $partial = null, ?array $remove = null): self
    {
        $self = new self();
        $self->full = $full;
        $self->partial = $partial;
        $self->remove = $remove;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('full', $data)) {
            $self->full = $data['full'];
        }
        if (array_key_exists('partial', $data)) {
            $self->partial = $data['partial'];
        }
        if (array_key_exists('remove', $data)) {
            $self->remove = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['remove'] ?? []);
        }

        return $self;
    }
}
