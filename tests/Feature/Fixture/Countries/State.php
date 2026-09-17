<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Countries;

class State implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?string $code;
    public Country $country;
    public string $name;

    /**
     * @return \Tests\Feature\Fixture\Countries\Fields\StateField<mixed>
     */
    public static function code(): Fields\StateField
    {
        return \Tests\Feature\Fixture\Countries\Fields\StateField::code();
    }

    /**
     * @return \Tests\Feature\Fixture\Countries\Fields\StateField<\Tests\Feature\Fixture\Countries\SelectionSet\CountrySelectionSet>
     */
    public static function country(): Fields\StateField
    {
        return \Tests\Feature\Fixture\Countries\Fields\StateField::country();
    }

    /**
     * @return \Tests\Feature\Fixture\Countries\Fields\StateField<mixed>
     */
    public static function name(): Fields\StateField
    {
        return \Tests\Feature\Fixture\Countries\Fields\StateField::name();
    }

    public static function new(Country $country, string $name, ?string $code = null): self
    {
        $self = new self();
        $self->country = $country;
        $self->name = $name;
        $self->code = $code;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('country', $data)) {
            $self->country = \Tests\Feature\Fixture\Countries\Country::fromArray($data['country']);
        }
        if (array_key_exists('name', $data)) {
            $self->name = $data['name'];
        }
        if (array_key_exists('code', $data)) {
            $self->code = $data['code'];
        }

        return $self;
    }
}
