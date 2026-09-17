<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class SceneMergeInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    /** @var array<string> */
    public array $source;
    public string $destination;
    public ?SceneUpdateInput $values;
    public ?bool $play_history;
    public ?bool $o_history;

    /**
     * @param array<string> $source
     */
    public static function new(
        array $source,
        string $destination,
        ?SceneUpdateInput $values = null,
        ?bool $play_history = null,
        ?bool $o_history = null,
    ): self {
        $self = new self();
        $self->source = $source;
        $self->destination = $destination;
        $self->values = $values;
        $self->play_history = $play_history;
        $self->o_history = $o_history;

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
            $self->values = \Tests\Feature\Fixture\Stash\SceneUpdateInput::fromArray($data['values']);
        }
        if (array_key_exists('play_history', $data)) {
            $self->play_history = $data['play_history'];
        }
        if (array_key_exists('o_history', $data)) {
            $self->o_history = $data['o_history'];
        }

        return $self;
    }
}
