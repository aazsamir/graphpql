<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class IdentifySource implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ScraperSource $source;
    public ?IdentifyMetadataOptions $options;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\IdentifySourceField<\Tests\Feature\Fixture\Stash\SelectionSet\ScraperSourceSelectionSet>
     */
    public static function source(): Fields\IdentifySourceField
    {
        return \Tests\Feature\Fixture\Stash\Fields\IdentifySourceField::source();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\IdentifySourceField<\Tests\Feature\Fixture\Stash\SelectionSet\IdentifyMetadataOptionsSelectionSet>
     */
    public static function options(): Fields\IdentifySourceField
    {
        return \Tests\Feature\Fixture\Stash\Fields\IdentifySourceField::options();
    }

    public static function new(ScraperSource $source, ?IdentifyMetadataOptions $options = null): self
    {
        $self = new self();
        $self->source = $source;
        $self->options = $options;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('source', $data)) {
            $self->source = \Tests\Feature\Fixture\Stash\ScraperSource::fromArray($data['source']);
        }
        if (array_key_exists('options', $data)) {
            $self->options = \Tests\Feature\Fixture\Stash\IdentifyMetadataOptions::fromArray($data['options']);
        }

        return $self;
    }
}
