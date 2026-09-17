<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Query;

class FindFile implements \Aazsamir\Graphpql\Model\Query
{
    public const NAME = 'findFile';

    private \Tests\Feature\Fixture\Stash\SelectionSet\BaseFileSelectionSet $selection;
    private \Aazsamir\Graphpql\Client\GraphqlClient $graphqlClient;

    public static function getName(): string
    {
        return self::NAME;
    }

    public function __construct(
        public ?string $id = null,
        public ?string $path = null,
    ) {
    }

    public function getVars(): array
    {
        return [
            'id' => $this->id,
            'path' => $this->path,
        ];
    }

    /**
     * @param callable(\Tests\Feature\Fixture\Stash\SelectionSet\BaseFileSelectionSet): void $selection
     */
    public function selector(callable $selection): self
    {
        if (!isset($this->child)) {
            $this->selection = \Tests\Feature\Fixture\Stash\SelectionSet\BaseFileSelectionSet::new();
        }

        $selection($this->selection);

        return $this;
    }

    public function setSelection(\Tests\Feature\Fixture\Stash\SelectionSet\BaseFileSelectionSet $selection): self
    {
        $this->selection = $selection;

        return $this;
    }

    public function getSelectionSet(): \Tests\Feature\Fixture\Stash\SelectionSet\BaseFileSelectionSet
    {
        return isset($this->selection) ? $this->selection : \Tests\Feature\Fixture\Stash\SelectionSet\BaseFileSelectionSet::new();
    }

    public function withClient(\Aazsamir\Graphpql\Client\GraphqlClient $graphqlClient): self
    {
        $clone = clone $this;
        $clone->graphqlClient = $graphqlClient;

        return $clone;
    }

    public function do(
    ): \Tests\Feature\Fixture\Stash\BasicFile|\Tests\Feature\Fixture\Stash\VideoFile|\Tests\Feature\Fixture\Stash\ImageFile|\Tests\Feature\Fixture\Stash\GalleryFile|null {
        return $this->serializeResponse($this->graphqlClient->request($this));
    }

    public function serializeResponse(
        \Aazsamir\Graphpql\Client\Response $response,
    ): \Tests\Feature\Fixture\Stash\BasicFile|\Tests\Feature\Fixture\Stash\VideoFile|\Tests\Feature\Fixture\Stash\ImageFile|\Tests\Feature\Fixture\Stash\GalleryFile|null {
        if ($response->data === null) {
            return null;
        }

        return ($response->data['__typename'] ?? '') === 'BasicFile'
                ? (\Tests\Feature\Fixture\Stash\BasicFile::fromArray($response->data))
                : (($response->data['__typename'] ?? '') === 'VideoFile'
                    ? (\Tests\Feature\Fixture\Stash\VideoFile::fromArray($response->data))
                    : (($response->data['__typename'] ?? '') === 'ImageFile'
                        ? (\Tests\Feature\Fixture\Stash\ImageFile::fromArray($response->data))
                        : (($response->data['__typename'] ?? '') === 'GalleryFile'
                            ? (\Tests\Feature\Fixture\Stash\GalleryFile::fromArray($response->data))
                            : (null))));
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
