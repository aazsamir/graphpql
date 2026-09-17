<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Countries\Query;

class Language implements \Aazsamir\Graphpql\Model\Query
{
    public const NAME = 'language';

    private \Tests\Feature\Fixture\Countries\SelectionSet\LanguageSelectionSet $selection;
    private \Aazsamir\Graphpql\Client\GraphqlClient $graphqlClient;

    public static function getName(): string
    {
        return self::NAME;
    }

    public function __construct(
        public string $code,
    ) {
    }

    public function getVars(): array
    {
        return [
            'code' => $this->code,
        ];
    }

    /**
     * @param callable(\Tests\Feature\Fixture\Countries\SelectionSet\LanguageSelectionSet): void $selection
     */
    public function selector(callable $selection): self
    {
        if (!isset($this->child)) {
            $this->selection = \Tests\Feature\Fixture\Countries\SelectionSet\LanguageSelectionSet::new();
        }

        $selection($this->selection);

        return $this;
    }

    public function setSelection(\Tests\Feature\Fixture\Countries\SelectionSet\LanguageSelectionSet $selection): self
    {
        $this->selection = $selection;

        return $this;
    }

    public function getSelectionSet(): \Tests\Feature\Fixture\Countries\SelectionSet\LanguageSelectionSet
    {
        return isset($this->selection) ? $this->selection : \Tests\Feature\Fixture\Countries\SelectionSet\LanguageSelectionSet::new();
    }

    public function withClient(\Aazsamir\Graphpql\Client\GraphqlClient $graphqlClient): self
    {
        $clone = clone $this;
        $clone->graphqlClient = $graphqlClient;

        return $clone;
    }

    public function do(): ?\Tests\Feature\Fixture\Countries\Language
    {
        $response = $this->graphqlClient->request($this);

        if ($response->data === null) {
            return null;
        }

        return \Tests\Feature\Fixture\Countries\Language::fromArray($response->data);
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
