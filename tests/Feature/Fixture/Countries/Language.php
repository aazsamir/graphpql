<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Countries;

class Language implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $code;

    /** @var array<\Tests\Feature\Fixture\Countries\Country> */
    public array $countries;
    public string $name;
    public string $native;
    public bool $rtl;

    /**
     * @return \Tests\Feature\Fixture\Countries\Fields\LanguageField<mixed>
     */
    public static function code(): Fields\LanguageField
    {
        return \Tests\Feature\Fixture\Countries\Fields\LanguageField::code();
    }

    /**
     * @return \Tests\Feature\Fixture\Countries\Fields\LanguageField<\Tests\Feature\Fixture\Countries\SelectionSet\CountrySelectionSet>
     */
    public static function countries(): Fields\LanguageField
    {
        return \Tests\Feature\Fixture\Countries\Fields\LanguageField::countries();
    }

    /**
     * @return \Tests\Feature\Fixture\Countries\Fields\LanguageField<mixed>
     */
    public static function name(): Fields\LanguageField
    {
        return \Tests\Feature\Fixture\Countries\Fields\LanguageField::name();
    }

    /**
     * @return \Tests\Feature\Fixture\Countries\Fields\LanguageField<mixed>
     */
    public static function native(): Fields\LanguageField
    {
        return \Tests\Feature\Fixture\Countries\Fields\LanguageField::native();
    }

    /**
     * @return \Tests\Feature\Fixture\Countries\Fields\LanguageField<mixed>
     */
    public static function rtl(): Fields\LanguageField
    {
        return \Tests\Feature\Fixture\Countries\Fields\LanguageField::rtl();
    }

    /**
     * @param array<\Tests\Feature\Fixture\Countries\Country> $countries
     */
    public static function new(string $code, array $countries, string $name, string $native, bool $rtl): self
    {
        $self = new self();
        $self->code = $code;
        $self->countries = $countries;
        $self->name = $name;
        $self->native = $native;
        $self->rtl = $rtl;

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
        if (array_key_exists('native', $data)) {
            $self->native = $data['native'];
        }
        if (array_key_exists('rtl', $data)) {
            $self->rtl = $data['rtl'];
        }

        return $self;
    }
}
