<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class IdentifyMetadataTaskOptions implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    /** @var array<\Tests\Feature\Fixture\Stash\IdentifySource> */
    public array $sources;
    public ?IdentifyMetadataOptions $options;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\IdentifyMetadataTaskOptionsField<\Tests\Feature\Fixture\Stash\SelectionSet\IdentifySourceSelectionSet>
     */
    public static function sources(): Fields\IdentifyMetadataTaskOptionsField
    {
        return \Tests\Feature\Fixture\Stash\Fields\IdentifyMetadataTaskOptionsField::sources();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\IdentifyMetadataTaskOptionsField<\Tests\Feature\Fixture\Stash\SelectionSet\IdentifyMetadataOptionsSelectionSet>
     */
    public static function options(): Fields\IdentifyMetadataTaskOptionsField
    {
        return \Tests\Feature\Fixture\Stash\Fields\IdentifyMetadataTaskOptionsField::options();
    }

    /**
     * @param array<\Tests\Feature\Fixture\Stash\IdentifySource> $sources
     */
    public static function new(array $sources, ?IdentifyMetadataOptions $options = null): self
    {
        $self = new self();
        $self->sources = $sources;
        $self->options = $options;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('sources', $data)) {
            $self->sources = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\IdentifySource::fromArray($data);
            }, $data['sources'] ?? []);
        }
        if (array_key_exists('options', $data)) {
            $self->options = \Tests\Feature\Fixture\Stash\IdentifyMetadataOptions::fromArray($data['options']);
        }

        return $self;
    }
}
