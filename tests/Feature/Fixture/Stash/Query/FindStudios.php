<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Query;

class FindStudios implements \Aazsamir\Graphpql\Model\Query
{
    public const NAME = 'findStudios';

    private \Tests\Feature\Fixture\Stash\SelectionSet\FindStudiosResultTypeSelectionSet $selection;
    private \Aazsamir\Graphpql\Client\GraphqlClient $graphqlClient;

    public static function getName(): string
    {
        return self::NAME;
    }

    /**
     * @param array<string> $ids
     */
    public function __construct(
        public ?\Tests\Feature\Fixture\Stash\StudioFilterType $studio_filter = null,
        public ?\Tests\Feature\Fixture\Stash\FindFilterType $filter = null,
        public ?array $ids = null,
    ) {
    }

    public function getVars(): array
    {
        return [
            'studio_filter' => $this->studio_filter,
            'filter' => $this->filter,
            'ids' => $this->ids,
        ];
    }

    /**
     * @param callable(\Tests\Feature\Fixture\Stash\SelectionSet\FindStudiosResultTypeSelectionSet): void $selection
     */
    public function selector(callable $selection): self
    {
        if (!isset($this->child)) {
            $this->selection = \Tests\Feature\Fixture\Stash\SelectionSet\FindStudiosResultTypeSelectionSet::new();
        }

        $selection($this->selection);

        return $this;
    }

    public function setSelection(
        \Tests\Feature\Fixture\Stash\SelectionSet\FindStudiosResultTypeSelectionSet $selection,
    ): self {
        $this->selection = $selection;

        return $this;
    }

    public function getSelectionSet(): \Tests\Feature\Fixture\Stash\SelectionSet\FindStudiosResultTypeSelectionSet
    {
        return isset($this->selection) ? $this->selection : \Tests\Feature\Fixture\Stash\SelectionSet\FindStudiosResultTypeSelectionSet::new();
    }

    public function withClient(\Aazsamir\Graphpql\Client\GraphqlClient $graphqlClient): self
    {
        $clone = clone $this;
        $clone->graphqlClient = $graphqlClient;

        return $clone;
    }

    public function do(): ?\Tests\Feature\Fixture\Stash\FindStudiosResultType
    {
        return $this->serializeResponse($this->graphqlClient->request($this));
    }

    public function serializeResponse(
        \Aazsamir\Graphpql\Client\Response $response,
    ): ?\Tests\Feature\Fixture\Stash\FindStudiosResultType {
        if ($response->data === null) {
            return null;
        }

        return \Tests\Feature\Fixture\Stash\FindStudiosResultType::fromArray($response->data);
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
