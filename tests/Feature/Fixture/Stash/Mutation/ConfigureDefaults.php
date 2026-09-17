<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Mutation;

class ConfigureDefaults implements \Aazsamir\Graphpql\Model\Mutation
{
    public const NAME = 'configureDefaults';

    private \Tests\Feature\Fixture\Stash\SelectionSet\ConfigDefaultSettingsResultSelectionSet $selection;
    private \Aazsamir\Graphpql\Client\GraphqlClient $graphqlClient;

    public static function getName(): string
    {
        return self::NAME;
    }

    public function __construct(
        public \Tests\Feature\Fixture\Stash\ConfigDefaultSettingsInput $input,
    ) {
    }

    public function getVars(): array
    {
        return [
            'input' => $this->input,
        ];
    }

    /**
     * @param callable(\Tests\Feature\Fixture\Stash\SelectionSet\ConfigDefaultSettingsResultSelectionSet): void $selection
     */
    public function selector(callable $selection): self
    {
        if (!isset($this->child)) {
            $this->selection = \Tests\Feature\Fixture\Stash\SelectionSet\ConfigDefaultSettingsResultSelectionSet::new();
        }

        $selection($this->selection);

        return $this;
    }

    public function setSelection(
        \Tests\Feature\Fixture\Stash\SelectionSet\ConfigDefaultSettingsResultSelectionSet $selection,
    ): self {
        $this->selection = $selection;

        return $this;
    }

    public function getSelectionSet(
    ): \Tests\Feature\Fixture\Stash\SelectionSet\ConfigDefaultSettingsResultSelectionSet {
        return isset($this->selection) ? $this->selection : \Tests\Feature\Fixture\Stash\SelectionSet\ConfigDefaultSettingsResultSelectionSet::new();
    }

    public function withClient(\Aazsamir\Graphpql\Client\GraphqlClient $graphqlClient): self
    {
        $clone = clone $this;
        $clone->graphqlClient = $graphqlClient;

        return $clone;
    }

    public function do(): ?\Tests\Feature\Fixture\Stash\ConfigDefaultSettingsResult
    {
        return $this->serializeResponse($this->graphqlClient->request($this));
    }

    public function serializeResponse(
        \Aazsamir\Graphpql\Client\Response $response,
    ): ?\Tests\Feature\Fixture\Stash\ConfigDefaultSettingsResult {
        if ($response->data === null) {
            return null;
        }

        return \Tests\Feature\Fixture\Stash\ConfigDefaultSettingsResult::fromArray($response->data);
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
