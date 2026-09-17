<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ScrapeSinglePerformerInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?string $query;
    public ?string $performer_id;
    public ?ScrapedPerformerInput $performer_input;

    public static function new(
        ?string $query = null,
        ?string $performer_id = null,
        ?ScrapedPerformerInput $performer_input = null,
    ): self {
        $self = new self();
        $self->query = $query;
        $self->performer_id = $performer_id;
        $self->performer_input = $performer_input;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('query', $data)) {
            $self->query = $data['query'];
        }
        if (array_key_exists('performer_id', $data)) {
            $self->performer_id = $data['performer_id'];
        }
        if (array_key_exists('performer_input', $data)) {
            $self->performer_input = \Tests\Feature\Fixture\Stash\ScrapedPerformerInput::fromArray($data['performer_input']);
        }

        return $self;
    }
}
