<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class StashBoxPerformerQueryResult implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $query;

    /** @var array<\Tests\Feature\Fixture\Stash\ScrapedPerformer> */
    public array $results;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StashBoxPerformerQueryResultField<mixed>
     */
    public static function query(): Fields\StashBoxPerformerQueryResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StashBoxPerformerQueryResultField::query();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StashBoxPerformerQueryResultField<\Tests\Feature\Fixture\Stash\SelectionSet\ScrapedPerformerSelectionSet>
     */
    public static function results(): Fields\StashBoxPerformerQueryResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StashBoxPerformerQueryResultField::results();
    }

    /**
     * @param array<\Tests\Feature\Fixture\Stash\ScrapedPerformer> $results
     */
    public static function new(string $query, array $results): self
    {
        $self = new self();
        $self->query = $query;
        $self->results = $results;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('query', $data)) {
            $self->query = $data['query'];
        }
        if (array_key_exists('results', $data)) {
            $self->results = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\ScrapedPerformer::fromArray($data);
            }, $data['results'] ?? []);
        }

        return $self;
    }
}
