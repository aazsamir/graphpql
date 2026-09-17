<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ScrapeSingleGroupInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?string $query;
    public ?string $group_id;
    public ?ScrapedGroupInput $group_input;

    public static function new(
        ?string $query = null,
        ?string $group_id = null,
        ?ScrapedGroupInput $group_input = null,
    ): self {
        $self = new self();
        $self->query = $query;
        $self->group_id = $group_id;
        $self->group_input = $group_input;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('query', $data)) {
            $self->query = $data['query'];
        }
        if (array_key_exists('group_id', $data)) {
            $self->group_id = $data['group_id'];
        }
        if (array_key_exists('group_input', $data)) {
            $self->group_input = \Tests\Feature\Fixture\Stash\ScrapedGroupInput::fromArray($data['group_input']);
        }

        return $self;
    }
}
