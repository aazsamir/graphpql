<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class Image implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $id;
    public ?string $title;
    public ?string $code;
    public ?int $rating100;
    public ?string $url;

    /** @var array<string> */
    public array $urls;
    public ?string $date;
    public ?string $details;
    public ?string $photographer;
    public ?int $o_counter;
    public bool $organized;
    public \DateTimeInterface $created_at;
    public \DateTimeInterface $updated_at;

    /** @var array<\Tests\Feature\Fixture\Stash\ImageFile> */
    public array $files;

    /** @var array<\Tests\Feature\Fixture\Stash\VideoFile|\Tests\Feature\Fixture\Stash\ImageFile> */
    public array $visual_files;
    public ImagePathsType $paths;

    /** @var array<\Tests\Feature\Fixture\Stash\Gallery> */
    public array $galleries;
    public ?Studio $studio;

    /** @var array<\Tests\Feature\Fixture\Stash\Tag> */
    public array $tags;

    /** @var array<\Tests\Feature\Fixture\Stash\Performer> */
    public array $performers;
    public mixed $custom_fields;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ImageField<mixed>
     */
    public static function id(): Fields\ImageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ImageField::id();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ImageField<mixed>
     */
    public static function title(): Fields\ImageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ImageField::title();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ImageField<mixed>
     */
    public static function code(): Fields\ImageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ImageField::code();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ImageField<mixed>
     */
    public static function rating100(): Fields\ImageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ImageField::rating100();
    }

    /**
     * @deprecated Use urls
     * @return \Tests\Feature\Fixture\Stash\Fields\ImageField<mixed>
     */
    public static function url(): Fields\ImageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ImageField::url();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ImageField<mixed>
     */
    public static function urls(): Fields\ImageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ImageField::urls();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ImageField<mixed>
     */
    public static function date(): Fields\ImageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ImageField::date();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ImageField<mixed>
     */
    public static function details(): Fields\ImageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ImageField::details();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ImageField<mixed>
     */
    public static function photographer(): Fields\ImageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ImageField::photographer();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ImageField<mixed>
     */
    public static function o_counter(): Fields\ImageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ImageField::o_counter();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ImageField<mixed>
     */
    public static function organized(): Fields\ImageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ImageField::organized();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ImageField<mixed>
     */
    public static function created_at(): Fields\ImageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ImageField::created_at();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ImageField<mixed>
     */
    public static function updated_at(): Fields\ImageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ImageField::updated_at();
    }

    /**
     * @deprecated Use visual_files
     * @return \Tests\Feature\Fixture\Stash\Fields\ImageField<\Tests\Feature\Fixture\Stash\SelectionSet\ImageFileSelectionSet>
     */
    public static function files(): Fields\ImageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ImageField::files();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ImageField<\Tests\Feature\Fixture\Stash\SelectionSet\VisualFileSelectionSet>
     */
    public static function visual_files(): Fields\ImageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ImageField::visual_files();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ImageField<\Tests\Feature\Fixture\Stash\SelectionSet\ImagePathsTypeSelectionSet>
     */
    public static function paths(): Fields\ImageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ImageField::paths();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ImageField<\Tests\Feature\Fixture\Stash\SelectionSet\GallerySelectionSet>
     */
    public static function galleries(): Fields\ImageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ImageField::galleries();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ImageField<\Tests\Feature\Fixture\Stash\SelectionSet\StudioSelectionSet>
     */
    public static function studio(): Fields\ImageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ImageField::studio();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ImageField<\Tests\Feature\Fixture\Stash\SelectionSet\TagSelectionSet>
     */
    public static function tags(): Fields\ImageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ImageField::tags();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ImageField<\Tests\Feature\Fixture\Stash\SelectionSet\PerformerSelectionSet>
     */
    public static function performers(): Fields\ImageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ImageField::performers();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ImageField<mixed>
     */
    public static function custom_fields(): Fields\ImageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ImageField::custom_fields();
    }

    /**
     * @param array<string> $urls
     * @param array<\Tests\Feature\Fixture\Stash\ImageFile> $files
     * @param array<\Tests\Feature\Fixture\Stash\VideoFile|\Tests\Feature\Fixture\Stash\ImageFile> $visual_files
     * @param array<\Tests\Feature\Fixture\Stash\Gallery> $galleries
     * @param array<\Tests\Feature\Fixture\Stash\Tag> $tags
     * @param array<\Tests\Feature\Fixture\Stash\Performer> $performers
     */
    public static function new(
        string $id,
        array $urls,
        bool $organized,
        \DateTimeInterface $created_at,
        \DateTimeInterface $updated_at,
        array $files,
        array $visual_files,
        ImagePathsType $paths,
        array $galleries,
        array $tags,
        array $performers,
        mixed $custom_fields,
        ?string $title = null,
        ?string $code = null,
        ?int $rating100 = null,
        ?string $url = null,
        ?string $date = null,
        ?string $details = null,
        ?string $photographer = null,
        ?int $o_counter = null,
        ?Studio $studio = null,
    ): self {
        $self = new self();
        $self->id = $id;
        $self->urls = $urls;
        $self->organized = $organized;
        $self->created_at = $created_at;
        $self->updated_at = $updated_at;
        $self->files = $files;
        $self->visual_files = $visual_files;
        $self->paths = $paths;
        $self->galleries = $galleries;
        $self->tags = $tags;
        $self->performers = $performers;
        $self->custom_fields = $custom_fields;
        $self->title = $title;
        $self->code = $code;
        $self->rating100 = $rating100;
        $self->url = $url;
        $self->date = $date;
        $self->details = $details;
        $self->photographer = $photographer;
        $self->o_counter = $o_counter;
        $self->studio = $studio;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('id', $data)) {
            $self->id = $data['id'];
        }
        if (array_key_exists('urls', $data)) {
            $self->urls = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['urls'] ?? []);
        }
        if (array_key_exists('organized', $data)) {
            $self->organized = $data['organized'];
        }
        if (array_key_exists('created_at', $data)) {
            $self->created_at = new \DateTimeImmutable($data['created_at']);
        }
        if (array_key_exists('updated_at', $data)) {
            $self->updated_at = new \DateTimeImmutable($data['updated_at']);
        }
        if (array_key_exists('files', $data)) {
            $self->files = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\ImageFile::fromArray($data);
            }, $data['files'] ?? []);
        }
        if (array_key_exists('visual_files', $data)) {
            $self->visual_files = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return ($data['__typename'] ?? '') === 'VideoFile'
                ? (\Tests\Feature\Fixture\Stash\VideoFile::fromArray($data))
                : (($data['__typename'] ?? '') === 'ImageFile'
                    ? (\Tests\Feature\Fixture\Stash\ImageFile::fromArray($data))
                    : (null));
            }, $data['visual_files'] ?? []);
        }
        if (array_key_exists('paths', $data)) {
            $self->paths = \Tests\Feature\Fixture\Stash\ImagePathsType::fromArray($data['paths']);
        }
        if (array_key_exists('galleries', $data)) {
            $self->galleries = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\Gallery::fromArray($data);
            }, $data['galleries'] ?? []);
        }
        if (array_key_exists('tags', $data)) {
            $self->tags = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\Tag::fromArray($data);
            }, $data['tags'] ?? []);
        }
        if (array_key_exists('performers', $data)) {
            $self->performers = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\Performer::fromArray($data);
            }, $data['performers'] ?? []);
        }
        if (array_key_exists('custom_fields', $data)) {
            $self->custom_fields = $data['custom_fields'];
        }
        if (array_key_exists('title', $data)) {
            $self->title = $data['title'];
        }
        if (array_key_exists('code', $data)) {
            $self->code = $data['code'];
        }
        if (array_key_exists('rating100', $data)) {
            $self->rating100 = $data['rating100'];
        }
        if (array_key_exists('url', $data)) {
            $self->url = $data['url'];
        }
        if (array_key_exists('date', $data)) {
            $self->date = $data['date'];
        }
        if (array_key_exists('details', $data)) {
            $self->details = $data['details'];
        }
        if (array_key_exists('photographer', $data)) {
            $self->photographer = $data['photographer'];
        }
        if (array_key_exists('o_counter', $data)) {
            $self->o_counter = $data['o_counter'];
        }
        if (array_key_exists('studio', $data)) {
            $self->studio = \Tests\Feature\Fixture\Stash\Studio::fromArray($data['studio']);
        }

        return $self;
    }
}
