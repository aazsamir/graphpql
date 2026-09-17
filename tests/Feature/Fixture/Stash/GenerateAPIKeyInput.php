<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class GenerateAPIKeyInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?bool $clear;

    public static function new(?bool $clear = null): self
    {
        $self = new self();
        $self->clear = $clear;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('clear', $data)) {
            $self->clear = $data['clear'];
        }

        return $self;
    }
}
