<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class Directory implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $path;
    public ?string $parent;

    /** @var array<string> */
    public array $directories;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\DirectoryField<mixed>
     */
    public static function path(): Fields\DirectoryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\DirectoryField::path();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\DirectoryField<mixed>
     */
    public static function parent(): Fields\DirectoryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\DirectoryField::parent();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\DirectoryField<mixed>
     */
    public static function directories(): Fields\DirectoryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\DirectoryField::directories();
    }

    /**
     * @param array<string> $directories
     */
    public static function new(string $path, array $directories, ?string $parent = null): self
    {
        $self = new self();
        $self->path = $path;
        $self->directories = $directories;
        $self->parent = $parent;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('path', $data)) {
            $self->path = $data['path'];
        }
        if (array_key_exists('directories', $data)) {
            $self->directories = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['directories'] ?? []);
        }
        if (array_key_exists('parent', $data)) {
            $self->parent = $data['parent'];
        }

        return $self;
    }
}
