<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ScrapeMultiPerformersInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    /** @var array<string> */
    public ?array $performer_ids;

    /**
     * @param array<string> $performer_ids
     */
    public static function new(?array $performer_ids = null): self
    {
        $self = new self();
        $self->performer_ids = $performer_ids;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('performer_ids', $data)) {
            $self->performer_ids = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['performer_ids'] ?? []);
        }

        return $self;
    }
}
