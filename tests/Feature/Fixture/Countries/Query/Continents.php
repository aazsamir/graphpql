<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Countries\Query;

class Continents implements \Aazsamir\Graphpql\Model\Query
{
    public const NAME = 'continents';

    private \Tests\Feature\Fixture\Countries\SelectionSet\ContinentSelectionSet $selection;
    private \Aazsamir\Graphpql\Client\GraphqlClient $graphqlClient;

    public static function getName(): string
    {
        return self::NAME;
    }

    public function __construct(
        public ?\Tests\Feature\Fixture\Countries\ContinentFilterInput $filter = null,
    ) {
    }

    public function getVars(): array
    {
        return [
            'filter' => $this->filter,
        ];
    }

    /**
     * @param callable(\Tests\Feature\Fixture\Countries\SelectionSet\ContinentSelectionSet): void $selection
     */
    public function selector(callable $selection): self
    {
        if (!isset($this->child)) {
            $this->selection = \Tests\Feature\Fixture\Countries\SelectionSet\ContinentSelectionSet::new();
        }

        $selection($this->selection);

        return $this;
    }

    public function setSelection(\Tests\Feature\Fixture\Countries\SelectionSet\ContinentSelectionSet $selection): self
    {
        $this->selection = $selection;

        return $this;
    }

    public function getSelectionSet(): \Tests\Feature\Fixture\Countries\SelectionSet\ContinentSelectionSet
    {
        return isset($this->selection) ? $this->selection : \Tests\Feature\Fixture\Countries\SelectionSet\ContinentSelectionSet::new();
    }

    public function withClient(\Aazsamir\Graphpql\Client\GraphqlClient $graphqlClient): self
    {
        $clone = clone $this;
        $clone->graphqlClient = $graphqlClient;

        return $clone;
    }

    /**
     * @return array<\Tests\Feature\Fixture\Countries\Continent>
     */
    public function do(): ?array
    {
        return $this->serializeResponse($this->graphqlClient->request($this));
    }

    /**
     * @return array<\Tests\Feature\Fixture\Countries\Continent>
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

            return \Tests\Feature\Fixture\Countries\Continent::fromArray($data);
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
