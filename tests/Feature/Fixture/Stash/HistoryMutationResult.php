<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class HistoryMutationResult implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public int $count;

    /** @var array<\DateTimeInterface> */
    public array $history;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\HistoryMutationResultField<mixed>
     */
    public static function count(): Fields\HistoryMutationResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\HistoryMutationResultField::count();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\HistoryMutationResultField<mixed>
     */
    public static function history(): Fields\HistoryMutationResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\HistoryMutationResultField::history();
    }

    /**
     * @param array<\DateTimeInterface> $history
     */
    public static function new(int $count, array $history): self
    {
        $self = new self();
        $self->count = $count;
        $self->history = $history;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('count', $data)) {
            $self->count = $data['count'];
        }
        if (array_key_exists('history', $data)) {
            $self->history = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return new \DateTimeImmutable($data);
            }, $data['history'] ?? []);
        }

        return $self;
    }
}
