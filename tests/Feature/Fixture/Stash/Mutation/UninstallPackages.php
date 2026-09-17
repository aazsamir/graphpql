<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Mutation;

class UninstallPackages implements \Aazsamir\Graphpql\Model\Mutation
{
    public const NAME = 'uninstallPackages';

    private \Aazsamir\Graphpql\Model\NullSelectionSet $selection;
    private \Aazsamir\Graphpql\Client\GraphqlClient $graphqlClient;

    public static function getName(): string
    {
        return self::NAME;
    }

    /**
     * @param array<\Tests\Feature\Fixture\Stash\PackageSpecInput> $packages
     */
    public function __construct(
        public \Tests\Feature\Fixture\Stash\PackageType $type,
        public array $packages,
    ) {
    }

    public function getVars(): array
    {
        return [
            'type' => $this->type,
            'packages' => $this->packages,
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
        $response = $this->graphqlClient->request($this);

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
