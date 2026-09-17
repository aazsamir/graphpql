<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class SaveFilterInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?string $id;
    public FilterMode $mode;
    public string $name;
    public ?FindFilterType $find_filter;
    public mixed $object_filter;
    public mixed $ui_options;

    public static function new(
        FilterMode $mode,
        string $name,
        ?string $id = null,
        ?FindFilterType $find_filter = null,
        mixed $object_filter = null,
        mixed $ui_options = null,
    ): self {
        $self = new self();
        $self->mode = $mode;
        $self->name = $name;
        $self->id = $id;
        $self->find_filter = $find_filter;
        $self->object_filter = $object_filter;
        $self->ui_options = $ui_options;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('mode', $data)) {
            $self->mode = \Tests\Feature\Fixture\Stash\FilterMode::from($data['mode']);
        }
        if (array_key_exists('name', $data)) {
            $self->name = $data['name'];
        }
        if (array_key_exists('id', $data)) {
            $self->id = $data['id'];
        }
        if (array_key_exists('find_filter', $data)) {
            $self->find_filter = \Tests\Feature\Fixture\Stash\FindFilterType::fromArray($data['find_filter']);
        }
        if (array_key_exists('object_filter', $data)) {
            $self->object_filter = $data['object_filter'];
        }
        if (array_key_exists('ui_options', $data)) {
            $self->ui_options = $data['ui_options'];
        }

        return $self;
    }
}
