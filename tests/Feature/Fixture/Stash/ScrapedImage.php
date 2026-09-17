<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ScrapedImage implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?string $title;
    public ?string $code;
    public ?string $details;
    public ?string $photographer;

    /** @var array<string> */
    public ?array $urls;
    public ?string $date;
    public ?ScrapedStudio $studio;

    /** @var array<\Tests\Feature\Fixture\Stash\ScrapedTag> */
    public ?array $tags;

    /** @var array<\Tests\Feature\Fixture\Stash\ScrapedPerformer> */
    public ?array $performers;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedImageField<mixed>
     */
    public static function title(): Fields\ScrapedImageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedImageField::title();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedImageField<mixed>
     */
    public static function code(): Fields\ScrapedImageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedImageField::code();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedImageField<mixed>
     */
    public static function details(): Fields\ScrapedImageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedImageField::details();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedImageField<mixed>
     */
    public static function photographer(): Fields\ScrapedImageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedImageField::photographer();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedImageField<mixed>
     */
    public static function urls(): Fields\ScrapedImageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedImageField::urls();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedImageField<mixed>
     */
    public static function date(): Fields\ScrapedImageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedImageField::date();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedImageField<\Tests\Feature\Fixture\Stash\SelectionSet\ScrapedStudioSelectionSet>
     */
    public static function studio(): Fields\ScrapedImageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedImageField::studio();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedImageField<\Tests\Feature\Fixture\Stash\SelectionSet\ScrapedTagSelectionSet>
     */
    public static function tags(): Fields\ScrapedImageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedImageField::tags();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedImageField<\Tests\Feature\Fixture\Stash\SelectionSet\ScrapedPerformerSelectionSet>
     */
    public static function performers(): Fields\ScrapedImageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedImageField::performers();
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
