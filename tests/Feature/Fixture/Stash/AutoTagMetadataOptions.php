<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class AutoTagMetadataOptions implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    /** @var array<string> */
    public ?array $performers;

    /** @var array<string> */
    public ?array $studios;

    /** @var array<string> */
    public ?array $tags;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\AutoTagMetadataOptionsField<mixed>
     */
    public static function performers(): Fields\AutoTagMetadataOptionsField
    {
        return \Tests\Feature\Fixture\Stash\Fields\AutoTagMetadataOptionsField::performers();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\AutoTagMetadataOptionsField<mixed>
     */
    public static function studios(): Fields\AutoTagMetadataOptionsField
    {
        return \Tests\Feature\Fixture\Stash\Fields\AutoTagMetadataOptionsField::studios();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\AutoTagMetadataOptionsField<mixed>
     */
    public static function tags(): Fields\AutoTagMetadataOptionsField
    {
        return \Tests\Feature\Fixture\Stash\Fields\AutoTagMetadataOptionsField::tags();
    }

    /**
     * @param array<string> $performers
     * @param array<string> $studios
     * @param array<string> $tags
     */
    public static function new(?array $performers = null, ?array $studios = null, ?array $tags = null): self
    {
        $self = new self();
        $self->performers = $performers;
        $self->studios = $studios;
        $self->tags = $tags;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('performers', $data)) {
            $self->performers = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['performers'] ?? []);
        }
        if (array_key_exists('studios', $data)) {
            $self->studios = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['studios'] ?? []);
        }
        if (array_key_exists('tags', $data)) {
            $self->tags = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['tags'] ?? []);
        }

        return $self;
    }
}
