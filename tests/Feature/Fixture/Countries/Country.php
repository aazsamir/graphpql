<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Countries;

class Country implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $awsRegion;
    public ?string $capital;
    public string $code;
    public Continent $continent;

    /** @var array<string> */
    public array $currencies;
    public ?string $currency;
    public string $emoji;
    public string $emojiU;

    /** @var array<\Tests\Feature\Fixture\Countries\Language> */
    public array $languages;
    public string $name;
    public string $native;
    public string $phone;

    /** @var array<string> */
    public array $phones;

    /** @var array<\Tests\Feature\Fixture\Countries\State> */
    public array $states;

    /** @var array<\Tests\Feature\Fixture\Countries\Subdivision> */
    public array $subdivisions;

    /**
     * @return \Tests\Feature\Fixture\Countries\Fields\CountryField<mixed>
     */
    public static function awsRegion(): Fields\CountryField
    {
        return \Tests\Feature\Fixture\Countries\Fields\CountryField::awsRegion();
    }

    /**
     * @return \Tests\Feature\Fixture\Countries\Fields\CountryField<mixed>
     */
    public static function capital(): Fields\CountryField
    {
        return \Tests\Feature\Fixture\Countries\Fields\CountryField::capital();
    }

    /**
     * @return \Tests\Feature\Fixture\Countries\Fields\CountryField<mixed>
     */
    public static function code(): Fields\CountryField
    {
        return \Tests\Feature\Fixture\Countries\Fields\CountryField::code();
    }

    /**
     * @return \Tests\Feature\Fixture\Countries\Fields\CountryField<\Tests\Feature\Fixture\Countries\SelectionSet\ContinentSelectionSet>
     */
    public static function continent(): Fields\CountryField
    {
        return \Tests\Feature\Fixture\Countries\Fields\CountryField::continent();
    }

    /**
     * @return \Tests\Feature\Fixture\Countries\Fields\CountryField<mixed>
     */
    public static function currencies(): Fields\CountryField
    {
        return \Tests\Feature\Fixture\Countries\Fields\CountryField::currencies();
    }

    /**
     * @return \Tests\Feature\Fixture\Countries\Fields\CountryField<mixed>
     */
    public static function currency(): Fields\CountryField
    {
        return \Tests\Feature\Fixture\Countries\Fields\CountryField::currency();
    }

    /**
     * @return \Tests\Feature\Fixture\Countries\Fields\CountryField<mixed>
     */
    public static function emoji(): Fields\CountryField
    {
        return \Tests\Feature\Fixture\Countries\Fields\CountryField::emoji();
    }

    /**
     * @return \Tests\Feature\Fixture\Countries\Fields\CountryField<mixed>
     */
    public static function emojiU(): Fields\CountryField
    {
        return \Tests\Feature\Fixture\Countries\Fields\CountryField::emojiU();
    }

    /**
     * @return \Tests\Feature\Fixture\Countries\Fields\CountryField<\Tests\Feature\Fixture\Countries\SelectionSet\LanguageSelectionSet>
     */
    public static function languages(): Fields\CountryField
    {
        return \Tests\Feature\Fixture\Countries\Fields\CountryField::languages();
    }

    /**
     * @return \Tests\Feature\Fixture\Countries\Fields\CountryField<mixed>
     */
    public static function name(?string $lang): Fields\CountryField
    {
        return \Tests\Feature\Fixture\Countries\Fields\CountryField::name($lang,);
    }

    /**
     * @return \Tests\Feature\Fixture\Countries\Fields\CountryField<mixed>
     */
    public static function native(): Fields\CountryField
    {
        return \Tests\Feature\Fixture\Countries\Fields\CountryField::native();
    }

    /**
     * @return \Tests\Feature\Fixture\Countries\Fields\CountryField<mixed>
     */
    public static function phone(): Fields\CountryField
    {
        return \Tests\Feature\Fixture\Countries\Fields\CountryField::phone();
    }

    /**
     * @return \Tests\Feature\Fixture\Countries\Fields\CountryField<mixed>
     */
    public static function phones(): Fields\CountryField
    {
        return \Tests\Feature\Fixture\Countries\Fields\CountryField::phones();
    }

    /**
     * @return \Tests\Feature\Fixture\Countries\Fields\CountryField<\Tests\Feature\Fixture\Countries\SelectionSet\StateSelectionSet>
     */
    public static function states(): Fields\CountryField
    {
        return \Tests\Feature\Fixture\Countries\Fields\CountryField::states();
    }

    /**
     * @return \Tests\Feature\Fixture\Countries\Fields\CountryField<\Tests\Feature\Fixture\Countries\SelectionSet\SubdivisionSelectionSet>
     */
    public static function subdivisions(): Fields\CountryField
    {
        return \Tests\Feature\Fixture\Countries\Fields\CountryField::subdivisions();
    }

    /**
     * @param array<string> $currencies
     * @param array<\Tests\Feature\Fixture\Countries\Language> $languages
     * @param array<string> $phones
     * @param array<\Tests\Feature\Fixture\Countries\State> $states
     * @param array<\Tests\Feature\Fixture\Countries\Subdivision> $subdivisions
     */
    public static function new(
        string $awsRegion,
        string $code,
        Continent $continent,
        array $currencies,
        string $emoji,
        string $emojiU,
        array $languages,
        string $name,
        string $native,
        string $phone,
        array $phones,
        array $states,
        array $subdivisions,
        ?string $capital = null,
        ?string $currency = null,
    ): self {
        $self = new self();
        $self->awsRegion = $awsRegion;
        $self->code = $code;
        $self->continent = $continent;
        $self->currencies = $currencies;
        $self->emoji = $emoji;
        $self->emojiU = $emojiU;
        $self->languages = $languages;
        $self->name = $name;
        $self->native = $native;
        $self->phone = $phone;
        $self->phones = $phones;
        $self->states = $states;
        $self->subdivisions = $subdivisions;
        $self->capital = $capital;
        $self->currency = $currency;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('awsRegion', $data)) {
            $self->awsRegion = $data['awsRegion'];
        }
        if (array_key_exists('code', $data)) {
            $self->code = $data['code'];
        }
        if (array_key_exists('continent', $data)) {
            $self->continent = \Tests\Feature\Fixture\Countries\Continent::fromArray($data['continent']);
        }
        if (array_key_exists('currencies', $data)) {
            $self->currencies = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['currencies'] ?? []);
        }
        if (array_key_exists('emoji', $data)) {
            $self->emoji = $data['emoji'];
        }
        if (array_key_exists('emojiU', $data)) {
            $self->emojiU = $data['emojiU'];
        }
        if (array_key_exists('languages', $data)) {
            $self->languages = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Countries\Language::fromArray($data);
            }, $data['languages'] ?? []);
        }
        if (array_key_exists('name', $data)) {
            $self->name = $data['name'];
        }
        if (array_key_exists('native', $data)) {
            $self->native = $data['native'];
        }
        if (array_key_exists('phone', $data)) {
            $self->phone = $data['phone'];
        }
        if (array_key_exists('phones', $data)) {
            $self->phones = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['phones'] ?? []);
        }
        if (array_key_exists('states', $data)) {
            $self->states = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Countries\State::fromArray($data);
            }, $data['states'] ?? []);
        }
        if (array_key_exists('subdivisions', $data)) {
            $self->subdivisions = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Countries\Subdivision::fromArray($data);
            }, $data['subdivisions'] ?? []);
        }
        if (array_key_exists('capital', $data)) {
            $self->capital = $data['capital'];
        }
        if (array_key_exists('currency', $data)) {
            $self->currency = $data['currency'];
        }

        return $self;
    }
}
