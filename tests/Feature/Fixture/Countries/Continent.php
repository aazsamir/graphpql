<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Countries;

class Continent implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $code;

    /** @var array<\Tests\Feature\Fixture\Countries\Country> */
    public array $countries;
    public string $name;

    /**
     * @return \Tests\Feature\Fixture\Countries\Fields\ContinentField<mixed>
     */
    public static function code(): Fields\ContinentField
    {
        return \Tests\Feature\Fixture\Countries\Fields\ContinentField::code();
    }

    /**
     * @return \Tests\Feature\Fixture\Countries\Fields\ContinentField<\Tests\Feature\Fixture\Countries\SelectionSet\CountrySelectionSet>
     */
    public static function countries(): Fields\ContinentField
    {
        return \Tests\Feature\Fixture\Countries\Fields\ContinentField::countries();
    }

    /**
     * @return \Tests\Feature\Fixture\Countries\Fields\ContinentField<mixed>
     */
    public static function name(): Fields\ContinentField
    {
        return \Tests\Feature\Fixture\Countries\Fields\ContinentField::name();
    }

    /**
     * @param array<\Tests\Feature\Fixture\Countries\Country> $countries
     */
    public static function new(string $code, array $countries, string $name): self
    {
        $self = new self();
        $self->code = $code;
        $self->countries = $countries;
        $self->name = $name;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('code', $data)) {
            $self->code = $data['code'];
        }
        if (array_key_exists('countries', $data)) {
            $self->countries = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Countries\Country::fromArray($data);
            }, $data['countries'] ?? []);
        }
        if (array_key_exists('name', $data)) {
            $self->name = $data['name'];
        }

        return $self;
    }
}
