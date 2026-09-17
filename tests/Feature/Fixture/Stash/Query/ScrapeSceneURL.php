<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Query;

class ScrapeSceneURL implements \Aazsamir\Graphpql\Model\Query
{
    public const NAME = 'scrapeSceneURL';

    private \Tests\Feature\Fixture\Stash\SelectionSet\ScrapedSceneSelectionSet $selection;
    private \Aazsamir\Graphpql\Client\GraphqlClient $graphqlClient;

    public static function getName(): string
    {
        return self::NAME;
    }

    public function __construct(
        public string $url,
    ) {
    }

    public function getVars(): array
    {
        return [
            'url' => $this->url,
        ];
    }

    /**
     * @param callable(\Tests\Feature\Fixture\Stash\SelectionSet\ScrapedSceneSelectionSet): void $selection
     */
    public function selector(callable $selection): self
    {
        if (!isset($this->child)) {
            $this->selection = \Tests\Feature\Fixture\Stash\SelectionSet\ScrapedSceneSelectionSet::new();
        }

        $selection($this->selection);

        return $this;
    }

    public function setSelection(\Tests\Feature\Fixture\Stash\SelectionSet\ScrapedSceneSelectionSet $selection): self
    {
        $this->selection = $selection;

        return $this;
    }

    public function getSelectionSet(): \Tests\Feature\Fixture\Stash\SelectionSet\ScrapedSceneSelectionSet
    {
        return isset($this->selection) ? $this->selection : \Tests\Feature\Fixture\Stash\SelectionSet\ScrapedSceneSelectionSet::new();
    }

    public function withClient(\Aazsamir\Graphpql\Client\GraphqlClient $graphqlClient): self
    {
        $clone = clone $this;
        $clone->graphqlClient = $graphqlClient;

        return $clone;
    }

    public function do(): ?\Tests\Feature\Fixture\Stash\ScrapedScene
    {
        return $this->serializeResponse($this->graphqlClient->request($this));
    }

    public function serializeResponse(
        \Aazsamir\Graphpql\Client\Response $response,
    ): ?\Tests\Feature\Fixture\Stash\ScrapedScene {
        if ($response->data === null) {
            return null;
        }

        return \Tests\Feature\Fixture\Stash\ScrapedScene::fromArray($response->data);
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
