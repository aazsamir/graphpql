<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class SavedFilter implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $id;
    public FilterMode $mode;
    public string $name;
    public string $filter;
    public ?SavedFindFilterType $find_filter;
    public mixed $object_filter;
    public mixed $ui_options;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SavedFilterField<mixed>
     */
    public static function id(): Fields\SavedFilterField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SavedFilterField::id();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SavedFilterField<mixed>
     */
    public static function mode(): Fields\SavedFilterField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SavedFilterField::mode();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SavedFilterField<mixed>
     */
    public static function name(): Fields\SavedFilterField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SavedFilterField::name();
    }

    /**
     * @deprecated use find_filter and object_filter instead
     * @return \Tests\Feature\Fixture\Stash\Fields\SavedFilterField<mixed>
     */
    public static function filter(): Fields\SavedFilterField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SavedFilterField::filter();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SavedFilterField<\Tests\Feature\Fixture\Stash\SelectionSet\SavedFindFilterTypeSelectionSet>
     */
    public static function find_filter(): Fields\SavedFilterField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SavedFilterField::find_filter();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SavedFilterField<mixed>
     */
    public static function object_filter(): Fields\SavedFilterField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SavedFilterField::object_filter();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SavedFilterField<mixed>
     */
    public static function ui_options(): Fields\SavedFilterField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SavedFilterField::ui_options();
    }

    public static function new(
        string $id,
        FilterMode $mode,
        string $name,
        string $filter,
        ?SavedFindFilterType $find_filter = null,
        mixed $object_filter = null,
        mixed $ui_options = null,
    ): self {
        $self = new self();
        $self->id = $id;
        $self->mode = $mode;
        $self->name = $name;
        $self->filter = $filter;
        $self->find_filter = $find_filter;
        $self->object_filter = $object_filter;
        $self->ui_options = $ui_options;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('id', $data)) {
            $self->id = $data['id'];
        }
        if (array_key_exists('mode', $data)) {
            $self->mode = \Tests\Feature\Fixture\Stash\FilterMode::from($data['mode']);
        }
        if (array_key_exists('name', $data)) {
            $self->name = $data['name'];
        }
        if (array_key_exists('filter', $data)) {
            $self->filter = $data['filter'];
        }
        if (array_key_exists('find_filter', $data)) {
            $self->find_filter = \Tests\Feature\Fixture\Stash\SavedFindFilterType::fromArray($data['find_filter']);
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
