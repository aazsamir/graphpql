<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ImageFileFilterInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?StringCriterionInput $format;
    public ?ResolutionCriterionInput $resolution;
    public ?OrientationCriterionInput $orientation;

    public static function new(
        ?StringCriterionInput $format = null,
        ?ResolutionCriterionInput $resolution = null,
        ?OrientationCriterionInput $orientation = null,
    ): self {
        $self = new self();
        $self->format = $format;
        $self->resolution = $resolution;
        $self->orientation = $orientation;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('format', $data)) {
            $self->format = \Tests\Feature\Fixture\Stash\StringCriterionInput::fromArray($data['format']);
        }
        if (array_key_exists('resolution', $data)) {
            $self->resolution = \Tests\Feature\Fixture\Stash\ResolutionCriterionInput::fromArray($data['resolution']);
        }
        if (array_key_exists('orientation', $data)) {
            $self->orientation = \Tests\Feature\Fixture\Stash\OrientationCriterionInput::fromArray($data['orientation']);
        }

        return $self;
    }
}
