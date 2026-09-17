<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class MoveFilesInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    /** @var array<string> */
    public array $ids;
    public ?string $destination_folder;
    public ?string $destination_folder_id;
    public ?string $destination_basename;

    /**
     * @param array<string> $ids
     */
    public static function new(
        array $ids,
        ?string $destination_folder = null,
        ?string $destination_folder_id = null,
        ?string $destination_basename = null,
    ): self {
        $self = new self();
        $self->ids = $ids;
        $self->destination_folder = $destination_folder;
        $self->destination_folder_id = $destination_folder_id;
        $self->destination_basename = $destination_basename;

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
        if (array_key_exists('destination_folder', $data)) {
            $self->destination_folder = $data['destination_folder'];
        }
        if (array_key_exists('destination_folder_id', $data)) {
            $self->destination_folder_id = $data['destination_folder_id'];
        }
        if (array_key_exists('destination_basename', $data)) {
            $self->destination_basename = $data['destination_basename'];
        }

        return $self;
    }
}
