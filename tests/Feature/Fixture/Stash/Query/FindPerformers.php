<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Query;

class FindPerformers implements \Aazsamir\Graphpql\Model\Query
{
    public const NAME = 'findPerformers';

    private \Tests\Feature\Fixture\Stash\SelectionSet\FindPerformersResultTypeSelectionSet $selection;
    private \Aazsamir\Graphpql\Client\GraphqlClient $graphqlClient;

    public static function getName(): string
    {
        return self::NAME;
    }

    /**
     * @param array<int> $performer_ids
     * @param array<string> $ids
     */
    public function __construct(
        public ?\Tests\Feature\Fixture\Stash\PerformerFilterType $performer_filter = null,
        public ?\Tests\Feature\Fixture\Stash\FindFilterType $filter = null,
        public ?array $performer_ids = null,
        public ?array $ids = null,
    ) {
    }

    public function getVars(): array
    {
        return [
            'performer_filter' => $this->performer_filter,
            'filter' => $this->filter,
            'performer_ids' => $this->performer_ids,
            'ids' => $this->ids,
        ];
    }

    /**
     * @param callable(\Tests\Feature\Fixture\Stash\SelectionSet\FindPerformersResultTypeSelectionSet): void $selection
     */
    public function selector(callable $selection): self
    {
        if (!isset($this->child)) {
            $this->selection = \Tests\Feature\Fixture\Stash\SelectionSet\FindPerformersResultTypeSelectionSet::new();
        }

        $selection($this->selection);

        return $this;
    }

    public function setSelection(
        \Tests\Feature\Fixture\Stash\SelectionSet\FindPerformersResultTypeSelectionSet $selection,
    ): self {
        $this->selection = $selection;

        return $this;
    }

    public function getSelectionSet(): \Tests\Feature\Fixture\Stash\SelectionSet\FindPerformersResultTypeSelectionSet
    {
        return isset($this->selection) ? $this->selection : \Tests\Feature\Fixture\Stash\SelectionSet\FindPerformersResultTypeSelectionSet::new();
    }

    public function withClient(\Aazsamir\Graphpql\Client\GraphqlClient $graphqlClient): self
    {
        $clone = clone $this;
        $clone->graphqlClient = $graphqlClient;

        return $clone;
    }

    public function do(): ?\Tests\Feature\Fixture\Stash\FindPerformersResultType
    {
        $response = $this->graphqlClient->request($this);

        if ($response->data === null) {
            return null;
        }

        return \Tests\Feature\Fixture\Stash\FindPerformersResultType::fromArray($response->data);
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
