<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Query;

class MarkerStrings implements \Aazsamir\Graphpql\Model\Query
{
    public const NAME = 'markerStrings';

    private \Tests\Feature\Fixture\Stash\SelectionSet\MarkerStringsResultTypeSelectionSet $selection;
    private \Aazsamir\Graphpql\Client\GraphqlClient $graphqlClient;

    public static function getName(): string
    {
        return self::NAME;
    }

    public function __construct(
        public ?string $q = null,
        public ?string $sort = null,
    ) {
    }

    public function getVars(): array
    {
        return [
            'q' => $this->q,
            'sort' => $this->sort,
        ];
    }

    /**
     * @param callable(\Tests\Feature\Fixture\Stash\SelectionSet\MarkerStringsResultTypeSelectionSet): void $selection
     */
    public function selector(callable $selection): self
    {
        if (!isset($this->child)) {
            $this->selection = \Tests\Feature\Fixture\Stash\SelectionSet\MarkerStringsResultTypeSelectionSet::new();
        }

        $selection($this->selection);

        return $this;
    }

    public function setSelection(
        \Tests\Feature\Fixture\Stash\SelectionSet\MarkerStringsResultTypeSelectionSet $selection,
    ): self {
        $this->selection = $selection;

        return $this;
    }

    public function getSelectionSet(): \Tests\Feature\Fixture\Stash\SelectionSet\MarkerStringsResultTypeSelectionSet
    {
        return isset($this->selection) ? $this->selection : \Tests\Feature\Fixture\Stash\SelectionSet\MarkerStringsResultTypeSelectionSet::new();
    }

    public function withClient(\Aazsamir\Graphpql\Client\GraphqlClient $graphqlClient): self
    {
        $clone = clone $this;
        $clone->graphqlClient = $graphqlClient;

        return $clone;
    }

    /**
     * @return array<\Tests\Feature\Fixture\Stash\MarkerStringsResultType>
     */
    public function do(): ?array
    {
        return $this->serializeResponse($this->graphqlClient->request($this));
    }

    /**
     * @return array<\Tests\Feature\Fixture\Stash\MarkerStringsResultType>
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

            return $data;
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
