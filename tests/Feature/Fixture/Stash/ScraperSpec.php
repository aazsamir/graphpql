<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ScraperSpec implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    /** @var array<string> */
    public ?array $urls;

    /** @var array<\Tests\Feature\Fixture\Stash\ScrapeType> */
    public array $supported_scrapes;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScraperSpecField<mixed>
     */
    public static function urls(): Fields\ScraperSpecField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScraperSpecField::urls();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScraperSpecField<mixed>
     */
    public static function supported_scrapes(): Fields\ScraperSpecField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScraperSpecField::supported_scrapes();
    }

    /**
     * @param array<\Tests\Feature\Fixture\Stash\ScrapeType> $supported_scrapes
     * @param array<string> $urls
     */
    public static function new(array $supported_scrapes, ?array $urls = null): self
    {
        $self = new self();
        $self->supported_scrapes = $supported_scrapes;
        $self->urls = $urls;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('supported_scrapes', $data)) {
            $self->supported_scrapes = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\ScrapeType::from($data);
            }, $data['supported_scrapes'] ?? []);
        }
        if (array_key_exists('urls', $data)) {
            $self->urls = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['urls'] ?? []);
        }

        return $self;
    }
}
