<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Query;

class FindFolders implements \Aazsamir\Graphpql\Model\Query
{
    public const NAME = 'findFolders';

    private \Tests\Feature\Fixture\Stash\SelectionSet\FindFoldersResultTypeSelectionSet $selection;
    private \Aazsamir\Graphpql\Client\GraphqlClient $graphqlClient;

    public static function getName(): string
    {
        return self::NAME;
    }

    /**
     * @param array<string> $ids
     */
    public function __construct(
        public ?\Tests\Feature\Fixture\Stash\FolderFilterType $folder_filter = null,
        public ?\Tests\Feature\Fixture\Stash\FindFilterType $filter = null,
        public ?array $ids = null,
    ) {
    }

    public function getVars(): array
    {
        return [
            'folder_filter' => $this->folder_filter,
            'filter' => $this->filter,
            'ids' => $this->ids,
        ];
    }

    /**
     * @param callable(\Tests\Feature\Fixture\Stash\SelectionSet\FindFoldersResultTypeSelectionSet): void $selection
     */
    public function selector(callable $selection): self
    {
        if (!isset($this->child)) {
            $this->selection = \Tests\Feature\Fixture\Stash\SelectionSet\FindFoldersResultTypeSelectionSet::new();
        }

        $selection($this->selection);

        return $this;
    }

    public function setSelection(
        \Tests\Feature\Fixture\Stash\SelectionSet\FindFoldersResultTypeSelectionSet $selection,
    ): self {
        $this->selection = $selection;

        return $this;
    }

    public function getSelectionSet(): \Tests\Feature\Fixture\Stash\SelectionSet\FindFoldersResultTypeSelectionSet
    {
        return isset($this->selection) ? $this->selection : \Tests\Feature\Fixture\Stash\SelectionSet\FindFoldersResultTypeSelectionSet::new();
    }

    public function withClient(\Aazsamir\Graphpql\Client\GraphqlClient $graphqlClient): self
    {
        $clone = clone $this;
        $clone->graphqlClient = $graphqlClient;

        return $clone;
    }

    public function do(): ?\Tests\Feature\Fixture\Stash\FindFoldersResultType
    {
        $response = $this->graphqlClient->request($this);

        if ($response->data === null) {
            return null;
        }

        return \Tests\Feature\Fixture\Stash\FindFoldersResultType::fromArray($response->data);
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
