<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class GalleryFile implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $id;
    public string $path;
    public string $basename;
    public string $parent_folder_id;
    public ?string $zip_file_id;
    public Folder $parent_folder;
    public ?BasicFile $zip_file;
    public \DateTimeInterface $mod_time;
    public int $size;
    public ?string $fingerprint;

    /** @var array<\Tests\Feature\Fixture\Stash\Fingerprint> */
    public array $fingerprints;
    public \DateTimeInterface $created_at;
    public \DateTimeInterface $updated_at;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryFileField<mixed>
     */
    public static function id(): Fields\GalleryFileField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryFileField::id();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryFileField<mixed>
     */
    public static function path(): Fields\GalleryFileField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryFileField::path();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryFileField<mixed>
     */
    public static function basename(): Fields\GalleryFileField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryFileField::basename();
    }

    /**
     * @deprecated Use parent_folder instead
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryFileField<mixed>
     */
    public static function parent_folder_id(): Fields\GalleryFileField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryFileField::parent_folder_id();
    }

    /**
     * @deprecated Use zip_file instead
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryFileField<mixed>
     */
    public static function zip_file_id(): Fields\GalleryFileField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryFileField::zip_file_id();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryFileField<\Tests\Feature\Fixture\Stash\SelectionSet\FolderSelectionSet>
     */
    public static function parent_folder(): Fields\GalleryFileField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryFileField::parent_folder();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryFileField<\Tests\Feature\Fixture\Stash\SelectionSet\BasicFileSelectionSet>
     */
    public static function zip_file(): Fields\GalleryFileField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryFileField::zip_file();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryFileField<mixed>
     */
    public static function mod_time(): Fields\GalleryFileField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryFileField::mod_time();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryFileField<mixed>
     */
    public static function size(): Fields\GalleryFileField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryFileField::size();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryFileField<mixed>
     */
    public static function fingerprint(string $type): Fields\GalleryFileField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryFileField::fingerprint($type,);
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryFileField<\Tests\Feature\Fixture\Stash\SelectionSet\FingerprintSelectionSet>
     */
    public static function fingerprints(): Fields\GalleryFileField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryFileField::fingerprints();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryFileField<mixed>
     */
    public static function created_at(): Fields\GalleryFileField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryFileField::created_at();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryFileField<mixed>
     */
    public static function updated_at(): Fields\GalleryFileField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryFileField::updated_at();
    }

    /**
     * @param array<\Tests\Feature\Fixture\Stash\Fingerprint> $fingerprints
     */
    public static function new(
        string $id,
        string $path,
        string $basename,
        string $parent_folder_id,
        Folder $parent_folder,
        \DateTimeInterface $mod_time,
        int $size,
        array $fingerprints,
        \DateTimeInterface $created_at,
        \DateTimeInterface $updated_at,
        ?string $zip_file_id = null,
        ?BasicFile $zip_file = null,
        ?string $fingerprint = null,
    ): self {
        $self = new self();
        $self->id = $id;
        $self->path = $path;
        $self->basename = $basename;
        $self->parent_folder_id = $parent_folder_id;
        $self->parent_folder = $parent_folder;
        $self->mod_time = $mod_time;
        $self->size = $size;
        $self->fingerprints = $fingerprints;
        $self->created_at = $created_at;
        $self->updated_at = $updated_at;
        $self->zip_file_id = $zip_file_id;
        $self->zip_file = $zip_file;
        $self->fingerprint = $fingerprint;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('id', $data)) {
            $self->id = $data['id'];
        }
        if (array_key_exists('path', $data)) {
            $self->path = $data['path'];
        }
        if (array_key_exists('basename', $data)) {
            $self->basename = $data['basename'];
        }
        if (array_key_exists('parent_folder_id', $data)) {
            $self->parent_folder_id = $data['parent_folder_id'];
        }
        if (array_key_exists('parent_folder', $data)) {
            $self->parent_folder = \Tests\Feature\Fixture\Stash\Folder::fromArray($data['parent_folder']);
        }
        if (array_key_exists('mod_time', $data)) {
            $self->mod_time = new \DateTimeImmutable($data['mod_time']);
        }
        if (array_key_exists('size', $data)) {
            $self->size = $data['size'];
        }
        if (array_key_exists('fingerprints', $data)) {
            $self->fingerprints = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\Fingerprint::fromArray($data);
            }, $data['fingerprints'] ?? []);
        }
        if (array_key_exists('created_at', $data)) {
            $self->created_at = new \DateTimeImmutable($data['created_at']);
        }
        if (array_key_exists('updated_at', $data)) {
            $self->updated_at = new \DateTimeImmutable($data['updated_at']);
        }
        if (array_key_exists('zip_file_id', $data)) {
            $self->zip_file_id = $data['zip_file_id'];
        }
        if (array_key_exists('zip_file', $data)) {
            $self->zip_file = \Tests\Feature\Fixture\Stash\BasicFile::fromArray($data['zip_file']);
        }
        if (array_key_exists('fingerprint', $data)) {
            $self->fingerprint = $data['fingerprint'];
        }

        return $self;
    }
}
