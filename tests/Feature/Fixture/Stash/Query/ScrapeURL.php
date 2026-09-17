<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Query;

class ScrapeURL implements \Aazsamir\Graphpql\Model\Query
{
    public const NAME = 'scrapeURL';

    private \Tests\Feature\Fixture\Stash\SelectionSet\ScrapedContentSelectionSet $selection;
    private \Aazsamir\Graphpql\Client\GraphqlClient $graphqlClient;

    public static function getName(): string
    {
        return self::NAME;
    }

    public function __construct(
        public string $url,
        public \Tests\Feature\Fixture\Stash\ScrapeContentType $ty,
    ) {
    }

    public function getVars(): array
    {
        return [
            'url' => $this->url,
            'ty' => $this->ty,
        ];
    }

    /**
     * @param callable(\Tests\Feature\Fixture\Stash\SelectionSet\ScrapedContentSelectionSet): void $selection
     */
    public function selector(callable $selection): self
    {
        if (!isset($this->child)) {
            $this->selection = \Tests\Feature\Fixture\Stash\SelectionSet\ScrapedContentSelectionSet::new();
        }

        $selection($this->selection);

        return $this;
    }

    public function setSelection(
        \Tests\Feature\Fixture\Stash\SelectionSet\ScrapedContentSelectionSet $selection,
    ): self {
        $this->selection = $selection;

        return $this;
    }

    public function getSelectionSet(): \Tests\Feature\Fixture\Stash\SelectionSet\ScrapedContentSelectionSet
    {
        return isset($this->selection) ? $this->selection : \Tests\Feature\Fixture\Stash\SelectionSet\ScrapedContentSelectionSet::new();
    }

    public function withClient(\Aazsamir\Graphpql\Client\GraphqlClient $graphqlClient): self
    {
        $clone = clone $this;
        $clone->graphqlClient = $graphqlClient;

        return $clone;
    }

    public function do(
    ): \Tests\Feature\Fixture\Stash\ScrapedStudio|\Tests\Feature\Fixture\Stash\ScrapedTag|\Tests\Feature\Fixture\Stash\ScrapedScene|\Tests\Feature\Fixture\Stash\ScrapedGallery|\Tests\Feature\Fixture\Stash\ScrapedImage|\Tests\Feature\Fixture\Stash\ScrapedMovie|\Tests\Feature\Fixture\Stash\ScrapedGroup|\Tests\Feature\Fixture\Stash\ScrapedPerformer|null {
        return $this->serializeResponse($this->graphqlClient->request($this));
    }

    public function serializeResponse(
        \Aazsamir\Graphpql\Client\Response $response,
    ): \Tests\Feature\Fixture\Stash\ScrapedStudio|\Tests\Feature\Fixture\Stash\ScrapedTag|\Tests\Feature\Fixture\Stash\ScrapedScene|\Tests\Feature\Fixture\Stash\ScrapedGallery|\Tests\Feature\Fixture\Stash\ScrapedImage|\Tests\Feature\Fixture\Stash\ScrapedMovie|\Tests\Feature\Fixture\Stash\ScrapedGroup|\Tests\Feature\Fixture\Stash\ScrapedPerformer|null {
        if ($response->data === null) {
            return null;
        }

        return ($response->data['__typename'] ?? '') === 'ScrapedStudio'
                ? (\Tests\Feature\Fixture\Stash\ScrapedStudio::fromArray($response->data))
                : (($response->data['__typename'] ?? '') === 'ScrapedTag'
                    ? (\Tests\Feature\Fixture\Stash\ScrapedTag::fromArray($response->data))
                    : (($response->data['__typename'] ?? '') === 'ScrapedScene'
                        ? (\Tests\Feature\Fixture\Stash\ScrapedScene::fromArray($response->data))
                        : (($response->data['__typename'] ?? '') === 'ScrapedGallery'
                            ? (\Tests\Feature\Fixture\Stash\ScrapedGallery::fromArray($response->data))
                            : (($response->data['__typename'] ?? '') === 'ScrapedImage'
                                ? (\Tests\Feature\Fixture\Stash\ScrapedImage::fromArray($response->data))
                                : (($response->data['__typename'] ?? '') === 'ScrapedMovie'
                                    ? (\Tests\Feature\Fixture\Stash\ScrapedMovie::fromArray($response->data))
                                    : (($response->data['__typename'] ?? '') === 'ScrapedGroup'
                                        ? (\Tests\Feature\Fixture\Stash\ScrapedGroup::fromArray($response->data))
                                        : (($response->data['__typename'] ?? '') === 'ScrapedPerformer'
                                            ? (\Tests\Feature\Fixture\Stash\ScrapedPerformer::fromArray($response->data))
                                            : (null))))))));
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
