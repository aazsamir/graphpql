<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class FindFilesResultType implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public int $count;
    public float $megapixels;
    public float $duration;
    public int $size;

    /** @var array<\Tests\Feature\Fixture\Stash\BasicFile|\Tests\Feature\Fixture\Stash\VideoFile|\Tests\Feature\Fixture\Stash\ImageFile|\Tests\Feature\Fixture\Stash\GalleryFile> */
    public array $files;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\FindFilesResultTypeField<mixed>
     */
    public static function count(): Fields\FindFilesResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\FindFilesResultTypeField::count();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\FindFilesResultTypeField<mixed>
     */
    public static function megapixels(): Fields\FindFilesResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\FindFilesResultTypeField::megapixels();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\FindFilesResultTypeField<mixed>
     */
    public static function duration(): Fields\FindFilesResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\FindFilesResultTypeField::duration();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\FindFilesResultTypeField<mixed>
     */
    public static function size(): Fields\FindFilesResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\FindFilesResultTypeField::size();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\FindFilesResultTypeField<\Tests\Feature\Fixture\Stash\SelectionSet\BaseFileSelectionSet>
     */
    public static function files(): Fields\FindFilesResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\FindFilesResultTypeField::files();
    }

    /**
     * @param array<\Tests\Feature\Fixture\Stash\BasicFile|\Tests\Feature\Fixture\Stash\VideoFile|\Tests\Feature\Fixture\Stash\ImageFile|\Tests\Feature\Fixture\Stash\GalleryFile> $files
     */
    public static function new(int $count, float $megapixels, float $duration, int $size, array $files): self
    {
        $self = new self();
        $self->count = $count;
        $self->megapixels = $megapixels;
        $self->duration = $duration;
        $self->size = $size;
        $self->files = $files;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('count', $data)) {
            $self->count = $data['count'];
        }
        if (array_key_exists('megapixels', $data)) {
            $self->megapixels = $data['megapixels'];
        }
        if (array_key_exists('duration', $data)) {
            $self->duration = $data['duration'];
        }
        if (array_key_exists('size', $data)) {
            $self->size = $data['size'];
        }
        if (array_key_exists('files', $data)) {
            $self->files = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return ($data['__typename'] ?? '') === 'BasicFile'
                ? (\Tests\Feature\Fixture\Stash\BasicFile::fromArray($data))
                : (($data['__typename'] ?? '') === 'VideoFile'
                    ? (\Tests\Feature\Fixture\Stash\VideoFile::fromArray($data))
                    : (($data['__typename'] ?? '') === 'ImageFile'
                        ? (\Tests\Feature\Fixture\Stash\ImageFile::fromArray($data))
                        : (($data['__typename'] ?? '') === 'GalleryFile'
                            ? (\Tests\Feature\Fixture\Stash\GalleryFile::fromArray($data))
                            : (null))));
            }, $data['files'] ?? []);
        }

        return $self;
    }
}
