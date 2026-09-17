<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class BulkUpdateGroupDescriptionsInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    /** @var array<\Tests\Feature\Fixture\Stash\GroupDescriptionInput> */
    public array $groups;
    public BulkUpdateIdMode $mode;

    /**
     * @param array<\Tests\Feature\Fixture\Stash\GroupDescriptionInput> $groups
     */
    public static function new(array $groups, BulkUpdateIdMode $mode): self
    {
        $self = new self();
        $self->groups = $groups;
        $self->mode = $mode;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('groups', $data)) {
            $self->groups = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\GroupDescriptionInput::fromArray($data);
            }, $data['groups'] ?? []);
        }
        if (array_key_exists('mode', $data)) {
            $self->mode = \Tests\Feature\Fixture\Stash\BulkUpdateIdMode::from($data['mode']);
        }

        return $self;
    }
}
