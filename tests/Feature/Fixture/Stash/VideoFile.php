<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class VideoFile implements \Aazsamir\Graphpql\Model\GraphObject
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
    public string $format;
    public int $width;
    public int $height;
    public float $duration;
    public string $video_codec;
    public string $audio_codec;
    public float $frame_rate;
    public int $bit_rate;
    public \DateTimeInterface $created_at;
    public \DateTimeInterface $updated_at;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\VideoFileField<mixed>
     */
    public static function id(): Fields\VideoFileField
    {
        return \Tests\Feature\Fixture\Stash\Fields\VideoFileField::id();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\VideoFileField<mixed>
     */
    public static function path(): Fields\VideoFileField
    {
        return \Tests\Feature\Fixture\Stash\Fields\VideoFileField::path();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\VideoFileField<mixed>
     */
    public static function basename(): Fields\VideoFileField
    {
        return \Tests\Feature\Fixture\Stash\Fields\VideoFileField::basename();
    }

    /**
     * @deprecated Use parent_folder instead
     * @return \Tests\Feature\Fixture\Stash\Fields\VideoFileField<mixed>
     */
    public static function parent_folder_id(): Fields\VideoFileField
    {
        return \Tests\Feature\Fixture\Stash\Fields\VideoFileField::parent_folder_id();
    }

    /**
     * @deprecated Use zip_file instead
     * @return \Tests\Feature\Fixture\Stash\Fields\VideoFileField<mixed>
     */
    public static function zip_file_id(): Fields\VideoFileField
    {
        return \Tests\Feature\Fixture\Stash\Fields\VideoFileField::zip_file_id();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\VideoFileField<\Tests\Feature\Fixture\Stash\SelectionSet\FolderSelectionSet>
     */
    public static function parent_folder(): Fields\VideoFileField
    {
        return \Tests\Feature\Fixture\Stash\Fields\VideoFileField::parent_folder();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\VideoFileField<\Tests\Feature\Fixture\Stash\SelectionSet\BasicFileSelectionSet>
     */
    public static function zip_file(): Fields\VideoFileField
    {
        return \Tests\Feature\Fixture\Stash\Fields\VideoFileField::zip_file();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\VideoFileField<mixed>
     */
    public static function mod_time(): Fields\VideoFileField
    {
        return \Tests\Feature\Fixture\Stash\Fields\VideoFileField::mod_time();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\VideoFileField<mixed>
     */
    public static function size(): Fields\VideoFileField
    {
        return \Tests\Feature\Fixture\Stash\Fields\VideoFileField::size();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\VideoFileField<mixed>
     */
    public static function fingerprint(string $type): Fields\VideoFileField
    {
        return \Tests\Feature\Fixture\Stash\Fields\VideoFileField::fingerprint($type,);
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\VideoFileField<\Tests\Feature\Fixture\Stash\SelectionSet\FingerprintSelectionSet>
     */
    public static function fingerprints(): Fields\VideoFileField
    {
        return \Tests\Feature\Fixture\Stash\Fields\VideoFileField::fingerprints();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\VideoFileField<mixed>
     */
    public static function format(): Fields\VideoFileField
    {
        return \Tests\Feature\Fixture\Stash\Fields\VideoFileField::format();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\VideoFileField<mixed>
     */
    public static function width(): Fields\VideoFileField
    {
        return \Tests\Feature\Fixture\Stash\Fields\VideoFileField::width();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\VideoFileField<mixed>
     */
    public static function height(): Fields\VideoFileField
    {
        return \Tests\Feature\Fixture\Stash\Fields\VideoFileField::height();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\VideoFileField<mixed>
     */
    public static function duration(): Fields\VideoFileField
    {
        return \Tests\Feature\Fixture\Stash\Fields\VideoFileField::duration();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\VideoFileField<mixed>
     */
    public static function video_codec(): Fields\VideoFileField
    {
        return \Tests\Feature\Fixture\Stash\Fields\VideoFileField::video_codec();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\VideoFileField<mixed>
     */
    public static function audio_codec(): Fields\VideoFileField
    {
        return \Tests\Feature\Fixture\Stash\Fields\VideoFileField::audio_codec();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\VideoFileField<mixed>
     */
    public static function frame_rate(): Fields\VideoFileField
    {
        return \Tests\Feature\Fixture\Stash\Fields\VideoFileField::frame_rate();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\VideoFileField<mixed>
     */
    public static function bit_rate(): Fields\VideoFileField
    {
        return \Tests\Feature\Fixture\Stash\Fields\VideoFileField::bit_rate();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\VideoFileField<mixed>
     */
    public static function created_at(): Fields\VideoFileField
    {
        return \Tests\Feature\Fixture\Stash\Fields\VideoFileField::created_at();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\VideoFileField<mixed>
     */
    public static function updated_at(): Fields\VideoFileField
    {
        return \Tests\Feature\Fixture\Stash\Fields\VideoFileField::updated_at();
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
        string $format,
        int $width,
        int $height,
        float $duration,
        string $video_codec,
        string $audio_codec,
        float $frame_rate,
        int $bit_rate,
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
        $self->format = $format;
        $self->width = $width;
        $self->height = $height;
        $self->duration = $duration;
        $self->video_codec = $video_codec;
        $self->audio_codec = $audio_codec;
        $self->frame_rate = $frame_rate;
        $self->bit_rate = $bit_rate;
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
        if (array_key_exists('format', $data)) {
            $self->format = $data['format'];
        }
        if (array_key_exists('width', $data)) {
            $self->width = $data['width'];
        }
        if (array_key_exists('height', $data)) {
            $self->height = $data['height'];
        }
        if (array_key_exists('duration', $data)) {
            $self->duration = $data['duration'];
        }
        if (array_key_exists('video_codec', $data)) {
            $self->video_codec = $data['video_codec'];
        }
        if (array_key_exists('audio_codec', $data)) {
            $self->audio_codec = $data['audio_codec'];
        }
        if (array_key_exists('frame_rate', $data)) {
            $self->frame_rate = $data['frame_rate'];
        }
        if (array_key_exists('bit_rate', $data)) {
            $self->bit_rate = $data['bit_rate'];
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
