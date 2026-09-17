<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Mutation;

class RunPluginTask implements \Aazsamir\Graphpql\Model\Mutation
{
    public const NAME = 'runPluginTask';

    private \Aazsamir\Graphpql\Model\NullSelectionSet $selection;
    private \Aazsamir\Graphpql\Client\GraphqlClient $graphqlClient;

    public static function getName(): string
    {
        return self::NAME;
    }

    /**
     * @param array<\Tests\Feature\Fixture\Stash\PluginArgInput> $args
     */
    public function __construct(
        public string $plugin_id,
        public ?string $task_name = null,
        public ?string $description = null,
        public ?array $args = null,
        public mixed $args_map = null,
    ) {
    }

    public function getVars(): array
    {
        return [
            'plugin_id' => $this->plugin_id,
            'task_name' => $this->task_name,
            'description' => $this->description,
            'args' => $this->args,
            'args_map' => $this->args_map,
        ];
    }

    /**
     * @param callable(\Aazsamir\Graphpql\Model\NullSelectionSet): void $selection
     */
    public function selector(callable $selection): self
    {
        if (!isset($this->child)) {
            $this->selection = \Aazsamir\Graphpql\Model\NullSelectionSet::new();
        }

        $selection($this->selection);

        return $this;
    }

    public function setSelection(\Aazsamir\Graphpql\Model\NullSelectionSet $selection): self
    {
        $this->selection = $selection;

        return $this;
    }

    public function getSelectionSet(): \Aazsamir\Graphpql\Model\NullSelectionSet
    {
        return isset($this->selection) ? $this->selection : \Aazsamir\Graphpql\Model\NullSelectionSet::new();
    }

    public function withClient(\Aazsamir\Graphpql\Client\GraphqlClient $graphqlClient): self
    {
        $clone = clone $this;
        $clone->graphqlClient = $graphqlClient;

        return $clone;
    }

    public function do(): ?string
    {
        return $this->serializeResponse($this->graphqlClient->request($this));
    }

    public function serializeResponse(\Aazsamir\Graphpql\Client\Response $response): ?string
    {
        if ($response->data === null) {
            return null;
        }

        return $response->data;
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
