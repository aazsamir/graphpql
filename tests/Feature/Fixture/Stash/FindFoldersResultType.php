<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class FindFoldersResultType implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public int $count;

    /** @var array<\Tests\Feature\Fixture\Stash\Folder> */
    public array $folders;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\FindFoldersResultTypeField<mixed>
     */
    public static function count(): Fields\FindFoldersResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\FindFoldersResultTypeField::count();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\FindFoldersResultTypeField<\Tests\Feature\Fixture\Stash\SelectionSet\FolderSelectionSet>
     */
    public static function folders(): Fields\FindFoldersResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\FindFoldersResultTypeField::folders();
    }

    /**
     * @param array<\Tests\Feature\Fixture\Stash\Folder> $folders
     */
    public static function new(int $count, array $folders): self
    {
        $self = new self();
        $self->count = $count;
        $self->folders = $folders;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('count', $data)) {
            $self->count = $data['count'];
        }
        if (array_key_exists('folders', $data)) {
            $self->folders = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\Folder::fromArray($data);
            }, $data['folders'] ?? []);
        }

        return $self;
    }
}
