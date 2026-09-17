<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ScraperSource implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?int $stash_box_index;
    public ?string $stash_box_endpoint;
    public ?string $scraper_id;

    /**
     * @deprecated use stash_box_endpoint
     * @return \Tests\Feature\Fixture\Stash\Fields\ScraperSourceField<mixed>
     */
    public static function stash_box_index(): Fields\ScraperSourceField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScraperSourceField::stash_box_index();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScraperSourceField<mixed>
     */
    public static function stash_box_endpoint(): Fields\ScraperSourceField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScraperSourceField::stash_box_endpoint();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScraperSourceField<mixed>
     */
    public static function scraper_id(): Fields\ScraperSourceField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScraperSourceField::scraper_id();
    }

    public static function new(
        ?int $stash_box_index = null,
        ?string $stash_box_endpoint = null,
        ?string $scraper_id = null,
    ): self {
        $self = new self();
        $self->stash_box_index = $stash_box_index;
        $self->stash_box_endpoint = $stash_box_endpoint;
        $self->scraper_id = $scraper_id;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('stash_box_index', $data)) {
            $self->stash_box_index = $data['stash_box_index'];
        }
        if (array_key_exists('stash_box_endpoint', $data)) {
            $self->stash_box_endpoint = $data['stash_box_endpoint'];
        }
        if (array_key_exists('scraper_id', $data)) {
            $self->scraper_id = $data['scraper_id'];
        }

        return $self;
    }
}
