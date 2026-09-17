<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ScrapeMultiScenesInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    /** @var array<string> */
    public ?array $scene_ids;

    /**
     * @param array<string> $scene_ids
     */
    public static function new(?array $scene_ids = null): self
    {
        $self = new self();
        $self->scene_ids = $scene_ids;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('scene_ids', $data)) {
            $self->scene_ids = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['scene_ids'] ?? []);
        }

        return $self;
    }
}
