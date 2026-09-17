<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Countries;

class CountryFilterInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?StringQueryOperatorInput $code;
    public ?StringQueryOperatorInput $continent;
    public ?StringQueryOperatorInput $currency;
    public ?StringQueryOperatorInput $name;

    public static function new(
        ?StringQueryOperatorInput $code = null,
        ?StringQueryOperatorInput $continent = null,
        ?StringQueryOperatorInput $currency = null,
        ?StringQueryOperatorInput $name = null,
    ): self {
        $self = new self();
        $self->code = $code;
        $self->continent = $continent;
        $self->currency = $currency;
        $self->name = $name;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('code', $data)) {
            $self->code = \Tests\Feature\Fixture\Countries\StringQueryOperatorInput::fromArray($data['code']);
        }
        if (array_key_exists('continent', $data)) {
            $self->continent = \Tests\Feature\Fixture\Countries\StringQueryOperatorInput::fromArray($data['continent']);
        }
        if (array_key_exists('currency', $data)) {
            $self->currency = \Tests\Feature\Fixture\Countries\StringQueryOperatorInput::fromArray($data['currency']);
        }
        if (array_key_exists('name', $data)) {
            $self->name = \Tests\Feature\Fixture\Countries\StringQueryOperatorInput::fromArray($data['name']);
        }

        return $self;
    }
}
