<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class IdentifySourceInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ScraperSourceInput $source;
    public ?IdentifyMetadataOptionsInput $options;

    public static function new(ScraperSourceInput $source, ?IdentifyMetadataOptionsInput $options = null): self
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
            $self->source = \Tests\Feature\Fixture\Stash\ScraperSourceInput::fromArray($data['source']);
        }
        if (array_key_exists('options', $data)) {
            $self->options = \Tests\Feature\Fixture\Stash\IdentifyMetadataOptionsInput::fromArray($data['options']);
        }

        return $self;
    }
}
