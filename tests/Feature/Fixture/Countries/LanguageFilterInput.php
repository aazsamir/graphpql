<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Countries;

class LanguageFilterInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?StringQueryOperatorInput $code;

    public static function new(?StringQueryOperatorInput $code = null): self
    {
        $self = new self();
        $self->code = $code;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('code', $data)) {
            $self->code = \Tests\Feature\Fixture\Countries\StringQueryOperatorInput::fromArray($data['code']);
        }

        return $self;
    }
}
