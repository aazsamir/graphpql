<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class TagsMergeInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    /** @var array<string> */
    public array $source;
    public string $destination;
    public ?TagUpdateInput $values;

    /**
     * @param array<string> $source
     */
    public static function new(array $source, string $destination, ?TagUpdateInput $values = null): self
    {
        $self = new self();
        $self->source = $source;
        $self->destination = $destination;
        $self->values = $values;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('source', $data)) {
            $self->source = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['source'] ?? []);
        }
        if (array_key_exists('destination', $data)) {
            $self->destination = $data['destination'];
        }
        if (array_key_exists('values', $data)) {
            $self->values = \Tests\Feature\Fixture\Stash\TagUpdateInput::fromArray($data['values']);
        }

        return $self;
    }
}
