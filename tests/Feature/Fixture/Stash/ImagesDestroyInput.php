<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ImagesDestroyInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    /** @var array<string> */
    public array $ids;
    public ?bool $delete_file;
    public ?bool $delete_generated;
    public ?bool $destroy_file_entry;

    /**
     * @param array<string> $ids
     */
    public static function new(
        array $ids,
        ?bool $delete_file = null,
        ?bool $delete_generated = null,
        ?bool $destroy_file_entry = null,
    ): self {
        $self = new self();
        $self->ids = $ids;
        $self->delete_file = $delete_file;
        $self->delete_generated = $delete_generated;
        $self->destroy_file_entry = $destroy_file_entry;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('ids', $data)) {
            $self->ids = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['ids'] ?? []);
        }
        if (array_key_exists('delete_file', $data)) {
            $self->delete_file = $data['delete_file'];
        }
        if (array_key_exists('delete_generated', $data)) {
            $self->delete_generated = $data['delete_generated'];
        }
        if (array_key_exists('destroy_file_entry', $data)) {
            $self->destroy_file_entry = $data['destroy_file_entry'];
        }

        return $self;
    }
}
