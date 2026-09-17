<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ScrapeSingleStudioInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?string $query;

    public static function new(?string $query = null): self
    {
        $self = new self();
        $self->query = $query;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('query', $data)) {
            $self->query = $data['query'];
        }

        return $self;
    }
}
