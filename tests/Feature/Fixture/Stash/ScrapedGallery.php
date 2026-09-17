<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ScrapedGallery implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?string $title;
    public ?string $code;
    public ?string $details;
    public ?string $photographer;
    public ?string $url;

    /** @var array<string> */
    public ?array $urls;
    public ?string $date;
    public ?ScrapedStudio $studio;

    /** @var array<\Tests\Feature\Fixture\Stash\ScrapedTag> */
    public ?array $tags;

    /** @var array<\Tests\Feature\Fixture\Stash\ScrapedPerformer> */
    public ?array $performers;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedGalleryField<mixed>
     */
    public static function title(): Fields\ScrapedGalleryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedGalleryField::title();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedGalleryField<mixed>
     */
    public static function code(): Fields\ScrapedGalleryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedGalleryField::code();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedGalleryField<mixed>
     */
    public static function details(): Fields\ScrapedGalleryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedGalleryField::details();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedGalleryField<mixed>
     */
    public static function photographer(): Fields\ScrapedGalleryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedGalleryField::photographer();
    }

    /**
     * @deprecated use urls
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedGalleryField<mixed>
     */
    public static function url(): Fields\ScrapedGalleryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedGalleryField::url();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedGalleryField<mixed>
     */
    public static function urls(): Fields\ScrapedGalleryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedGalleryField::urls();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedGalleryField<mixed>
     */
    public static function date(): Fields\ScrapedGalleryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedGalleryField::date();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedGalleryField<\Tests\Feature\Fixture\Stash\SelectionSet\ScrapedStudioSelectionSet>
     */
    public static function studio(): Fields\ScrapedGalleryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedGalleryField::studio();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedGalleryField<\Tests\Feature\Fixture\Stash\SelectionSet\ScrapedTagSelectionSet>
     */
    public static function tags(): Fields\ScrapedGalleryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedGalleryField::tags();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedGalleryField<\Tests\Feature\Fixture\Stash\SelectionSet\ScrapedPerformerSelectionSet>
     */
    public static function performers(): Fields\ScrapedGalleryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedGalleryField::performers();
    }

    /**
     * @param array<string> $urls
     * @param array<\Tests\Feature\Fixture\Stash\ScrapedTag> $tags
     * @param array<\Tests\Feature\Fixture\Stash\ScrapedPerformer> $performers
     */
    public static function new(
        ?string $title = null,
        ?string $code = null,
        ?string $details = null,
        ?string $photographer = null,
        ?string $url = null,
        ?array $urls = null,
        ?string $date = null,
        ?ScrapedStudio $studio = null,
        ?array $tags = null,
        ?array $performers = null,
    ): self {
        $self = new self();
        $self->title = $title;
        $self->code = $code;
        $self->details = $details;
        $self->photographer = $photographer;
        $self->url = $url;
        $self->urls = $urls;
        $self->date = $date;
        $self->studio = $studio;
        $self->tags = $tags;
        $self->performers = $performers;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('title', $data)) {
            $self->title = $data['title'];
        }
        if (array_key_exists('code', $data)) {
            $self->code = $data['code'];
        }
        if (array_key_exists('details', $data)) {
            $self->details = $data['details'];
        }
        if (array_key_exists('photographer', $data)) {
            $self->photographer = $data['photographer'];
        }
        if (array_key_exists('url', $data)) {
            $self->url = $data['url'];
        }
        if (array_key_exists('urls', $data)) {
            $self->urls = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['urls'] ?? []);
        }
        if (array_key_exists('date', $data)) {
            $self->date = $data['date'];
        }
        if (array_key_exists('studio', $data)) {
            $self->studio = \Tests\Feature\Fixture\Stash\ScrapedStudio::fromArray($data['studio']);
        }
        if (array_key_exists('tags', $data)) {
            $self->tags = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\ScrapedTag::fromArray($data);
            }, $data['tags'] ?? []);
        }
        if (array_key_exists('performers', $data)) {
            $self->performers = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\ScrapedPerformer::fromArray($data);
            }, $data['performers'] ?? []);
        }

        return $self;
    }
}
