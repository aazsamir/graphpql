<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Query;

class ListScrapers implements \Aazsamir\Graphpql\Model\Query
{
    public const NAME = 'listScrapers';

    private \Tests\Feature\Fixture\Stash\SelectionSet\ScraperSelectionSet $selection;
    private \Aazsamir\Graphpql\Client\GraphqlClient $graphqlClient;

    public static function getName(): string
    {
        return self::NAME;
    }

    /**
     * @param array<\Tests\Feature\Fixture\Stash\ScrapeContentType> $types
     */
    public function __construct(
        public array $types,
    ) {
    }

    public function getVars(): array
    {
        return [
            'types' => $this->types,
        ];
    }

    /**
     * @param callable(\Tests\Feature\Fixture\Stash\SelectionSet\ScraperSelectionSet): void $selection
     */
    public function selector(callable $selection): self
    {
        if (!isset($this->child)) {
            $this->selection = \Tests\Feature\Fixture\Stash\SelectionSet\ScraperSelectionSet::new();
        }

        $selection($this->selection);

        return $this;
    }

    public function setSelection(\Tests\Feature\Fixture\Stash\SelectionSet\ScraperSelectionSet $selection): self
    {
        $this->selection = $selection;

        return $this;
    }

    public function getSelectionSet(): \Tests\Feature\Fixture\Stash\SelectionSet\ScraperSelectionSet
    {
        return isset($this->selection) ? $this->selection : \Tests\Feature\Fixture\Stash\SelectionSet\ScraperSelectionSet::new();
    }

    public function withClient(\Aazsamir\Graphpql\Client\GraphqlClient $graphqlClient): self
    {
        $clone = clone $this;
        $clone->graphqlClient = $graphqlClient;

        return $clone;
    }

    /**
     * @return array<\Tests\Feature\Fixture\Stash\Scraper>
     */
    public function do(): ?array
    {
        return $this->serializeResponse($this->graphqlClient->request($this));
    }

    /**
     * @return array<\Tests\Feature\Fixture\Stash\Scraper>
     */
    public function serializeResponse(\Aazsamir\Graphpql\Client\Response $response): ?array
    {
        if ($response->data === null) {
            return null;
        }

        return array_map(function ($data) {
            if ($data === []) {
                return [];
            }

            return \Tests\Feature\Fixture\Stash\Scraper::fromArray($data);
        }, $response->data ?? []);
    }

    public function dd(): never
    {
        $content = new \Aazsamir\Graphpql\Client\QueryBuilder()->fromOperation($this);

        if (function_exists('dd')) {
            dd($content);
        }

        echo "<pre><br>
        ";
        echo($content);
        echo "</pre><br>
        ";
        exit(1);
    }
}
