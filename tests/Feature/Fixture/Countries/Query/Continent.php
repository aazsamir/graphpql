<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Countries\Query;

class Continent implements \Aazsamir\Graphpql\Model\Query
{
    public const NAME = 'continent';

    private \Tests\Feature\Fixture\Countries\SelectionSet\ContinentSelectionSet $selection;
    private \Aazsamir\Graphpql\Client\GraphqlClient $graphqlClient;

    public static function getName(): string
    {
        return self::NAME;
    }

    public function __construct(
        public string $code,
    ) {
    }

    public function getVars(): array
    {
        return [
            'code' => $this->code,
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

    public function do(): ?\Tests\Feature\Fixture\Countries\Continent
    {
        return $this->serializeResponse($this->graphqlClient->request($this));
    }

    public function serializeResponse(
        \Aazsamir\Graphpql\Client\Response $response,
    ): ?\Tests\Feature\Fixture\Countries\Continent {
        if ($response->data === null) {
            return null;
        }

        return \Tests\Feature\Fixture\Countries\Continent::fromArray($response->data);
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
