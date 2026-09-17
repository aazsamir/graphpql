<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class SceneParserResultType implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public int $count;

    /** @var array<\Tests\Feature\Fixture\Stash\SceneParserResult> */
    public array $results;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneParserResultTypeField<mixed>
     */
    public static function count(): Fields\SceneParserResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneParserResultTypeField::count();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SceneParserResultTypeField<\Tests\Feature\Fixture\Stash\SelectionSet\SceneParserResultSelectionSet>
     */
    public static function results(): Fields\SceneParserResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SceneParserResultTypeField::results();
    }

    /**
     * @param array<\Tests\Feature\Fixture\Stash\SceneParserResult> $results
     */
    public static function new(int $count, array $results): self
    {
        $self = new self();
        $self->count = $count;
        $self->results = $results;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('count', $data)) {
            $self->count = $data['count'];
        }
        if (array_key_exists('results', $data)) {
            $self->results = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\SceneParserResult::fromArray($data);
            }, $data['results'] ?? []);
        }

        return $self;
    }
}
