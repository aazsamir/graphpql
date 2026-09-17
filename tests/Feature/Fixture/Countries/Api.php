<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Countries;

class Api
{
    public function __construct(
        public \Aazsamir\Graphpql\Client\GraphqlClient $graphqlClient,
    ) {
    }

    public function continent(string $code): Query\Continent
    {
        $operation = new \Tests\Feature\Fixture\Countries\Query\Continent(
            $code,
        );

        return $operation->withClient($this->graphqlClient);
    }

    public function continents(?ContinentFilterInput $filter = null): Query\Continents
    {
        $operation = new \Tests\Feature\Fixture\Countries\Query\Continents(
            $filter,
        );

        return $operation->withClient($this->graphqlClient);
    }

    public function countries(?CountryFilterInput $filter = null): Query\Countries
    {
        $operation = new \Tests\Feature\Fixture\Countries\Query\Countries(
            $filter,
        );

        return $operation->withClient($this->graphqlClient);
    }

    public function country(string $code): Query\Country
    {
        $operation = new \Tests\Feature\Fixture\Countries\Query\Country(
            $code,
        );

        return $operation->withClient($this->graphqlClient);
    }

    public function language(string $code): Query\Language
    {
        $operation = new \Tests\Feature\Fixture\Countries\Query\Language(
            $code,
        );

        return $operation->withClient($this->graphqlClient);
    }

    public function languages(?LanguageFilterInput $filter = null): Query\Languages
    {
        $operation = new \Tests\Feature\Fixture\Countries\Query\Languages(
            $filter,
        );

        return $operation->withClient($this->graphqlClient);
    }
}
