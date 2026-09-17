<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class Gallery implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $id;
    public ?string $title;
    public ?string $code;
    public ?string $url;

    /** @var array<string> */
    public array $urls;
    public ?string $date;
    public ?string $details;
    public ?string $photographer;
    public ?int $rating100;
    public bool $organized;
    public \DateTimeInterface $created_at;
    public \DateTimeInterface $updated_at;

    /** @var array<\Tests\Feature\Fixture\Stash\GalleryFile> */
    public array $files;
    public ?Folder $folder;

    /** @var array<\Tests\Feature\Fixture\Stash\GalleryChapter> */
    public array $chapters;

    /** @var array<\Tests\Feature\Fixture\Stash\Scene> */
    public array $scenes;
    public ?Studio $studio;
    public int $image_count;

    /** @var array<\Tests\Feature\Fixture\Stash\Tag> */
    public array $tags;

    /** @var array<\Tests\Feature\Fixture\Stash\Performer> */
    public array $performers;
    public ?Image $cover;
    public GalleryPathsType $paths;
    public mixed $custom_fields;
    public Image $image;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryField<mixed>
     */
    public static function id(): Fields\GalleryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryField::id();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryField<mixed>
     */
    public static function title(): Fields\GalleryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryField::title();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryField<mixed>
     */
    public static function code(): Fields\GalleryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryField::code();
    }

    /**
     * @deprecated Use urls
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryField<mixed>
     */
    public static function url(): Fields\GalleryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryField::url();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryField<mixed>
     */
    public static function urls(): Fields\GalleryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryField::urls();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryField<mixed>
     */
    public static function date(): Fields\GalleryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryField::date();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryField<mixed>
     */
    public static function details(): Fields\GalleryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryField::details();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryField<mixed>
     */
    public static function photographer(): Fields\GalleryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryField::photographer();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryField<mixed>
     */
    public static function rating100(): Fields\GalleryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryField::rating100();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryField<mixed>
     */
    public static function organized(): Fields\GalleryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryField::organized();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryField<mixed>
     */
    public static function created_at(): Fields\GalleryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryField::created_at();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryField<mixed>
     */
    public static function updated_at(): Fields\GalleryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryField::updated_at();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryField<\Tests\Feature\Fixture\Stash\SelectionSet\GalleryFileSelectionSet>
     */
    public static function files(): Fields\GalleryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryField::files();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryField<\Tests\Feature\Fixture\Stash\SelectionSet\FolderSelectionSet>
     */
    public static function folder(): Fields\GalleryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryField::folder();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryField<\Tests\Feature\Fixture\Stash\SelectionSet\GalleryChapterSelectionSet>
     */
    public static function chapters(): Fields\GalleryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryField::chapters();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryField<\Tests\Feature\Fixture\Stash\SelectionSet\SceneSelectionSet>
     */
    public static function scenes(): Fields\GalleryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryField::scenes();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryField<\Tests\Feature\Fixture\Stash\SelectionSet\StudioSelectionSet>
     */
    public static function studio(): Fields\GalleryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryField::studio();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryField<mixed>
     */
    public static function image_count(): Fields\GalleryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryField::image_count();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryField<\Tests\Feature\Fixture\Stash\SelectionSet\TagSelectionSet>
     */
    public static function tags(): Fields\GalleryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryField::tags();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryField<\Tests\Feature\Fixture\Stash\SelectionSet\PerformerSelectionSet>
     */
    public static function performers(): Fields\GalleryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryField::performers();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryField<\Tests\Feature\Fixture\Stash\SelectionSet\ImageSelectionSet>
     */
    public static function cover(): Fields\GalleryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryField::cover();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryField<\Tests\Feature\Fixture\Stash\SelectionSet\GalleryPathsTypeSelectionSet>
     */
    public static function paths(): Fields\GalleryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryField::paths();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryField<mixed>
     */
    public static function custom_fields(): Fields\GalleryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryField::custom_fields();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\GalleryField<\Tests\Feature\Fixture\Stash\SelectionSet\ImageSelectionSet>
     */
    public static function image(int $index): Fields\GalleryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\GalleryField::image($index,);
    }

    /**
     * @param array<string> $urls
     * @param array<\Tests\Feature\Fixture\Stash\GalleryFile> $files
     * @param array<\Tests\Feature\Fixture\Stash\GalleryChapter> $chapters
     * @param array<\Tests\Feature\Fixture\Stash\Scene> $scenes
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
        array $chapters,
        array $scenes,
        int $image_count,
        array $tags,
        array $performers,
        GalleryPathsType $paths,
        mixed $custom_fields,
        Image $image,
        ?string $title = null,
        ?string $code = null,
        ?string $url = null,
        ?string $date = null,
        ?string $details = null,
        ?string $photographer = null,
        ?int $rating100 = null,
        ?Folder $folder = null,
        ?Studio $studio = null,
        ?Image $cover = null,
    ): self {
        $self = new self();
        $self->id = $id;
        $self->urls = $urls;
        $self->organized = $organized;
        $self->created_at = $created_at;
        $self->updated_at = $updated_at;
        $self->files = $files;
        $self->chapters = $chapters;
        $self->scenes = $scenes;
        $self->image_count = $image_count;
        $self->tags = $tags;
        $self->performers = $performers;
        $self->paths = $paths;
        $self->custom_fields = $custom_fields;
        $self->image = $image;
        $self->title = $title;
        $self->code = $code;
        $self->url = $url;
        $self->date = $date;
        $self->details = $details;
        $self->photographer = $photographer;
        $self->rating100 = $rating100;
        $self->folder = $folder;
        $self->studio = $studio;
        $self->cover = $cover;

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

                return \Tests\Feature\Fixture\Stash\GalleryFile::fromArray($data);
            }, $data['files'] ?? []);
        }
        if (array_key_exists('chapters', $data)) {
            $self->chapters = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\GalleryChapter::fromArray($data);
            }, $data['chapters'] ?? []);
        }
        if (array_key_exists('scenes', $data)) {
            $self->scenes = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\Scene::fromArray($data);
            }, $data['scenes'] ?? []);
        }
        if (array_key_exists('image_count', $data)) {
            $self->image_count = $data['image_count'];
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
        if (array_key_exists('paths', $data)) {
            $self->paths = \Tests\Feature\Fixture\Stash\GalleryPathsType::fromArray($data['paths']);
        }
        if (array_key_exists('custom_fields', $data)) {
            $self->custom_fields = $data['custom_fields'];
        }
        if (array_key_exists('image', $data)) {
            $self->image = \Tests\Feature\Fixture\Stash\Image::fromArray($data['image']);
        }
        if (array_key_exists('title', $data)) {
            $self->title = $data['title'];
        }
        if (array_key_exists('code', $data)) {
            $self->code = $data['code'];
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
        if (array_key_exists('rating100', $data)) {
            $self->rating100 = $data['rating100'];
        }
        if (array_key_exists('folder', $data)) {
            $self->folder = \Tests\Feature\Fixture\Stash\Folder::fromArray($data['folder']);
        }
        if (array_key_exists('studio', $data)) {
            $self->studio = \Tests\Feature\Fixture\Stash\Studio::fromArray($data['studio']);
        }
        if (array_key_exists('cover', $data)) {
            $self->cover = \Tests\Feature\Fixture\Stash\Image::fromArray($data['cover']);
        }

        return $self;
    }
}
