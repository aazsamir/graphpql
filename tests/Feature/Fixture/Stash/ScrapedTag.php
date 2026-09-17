<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ScrapedTag implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?string $stored_id;
    public string $name;
    public ?string $description;

    /** @var array<string> */
    public ?array $alias_list;
    public ?ScrapedTag $parent;
    public ?string $remote_site_id;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedTagField<mixed>
     */
    public static function stored_id(): Fields\ScrapedTagField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedTagField::stored_id();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedTagField<mixed>
     */
    public static function name(): Fields\ScrapedTagField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedTagField::name();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedTagField<mixed>
     */
    public static function description(): Fields\ScrapedTagField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedTagField::description();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedTagField<mixed>
     */
    public static function alias_list(): Fields\ScrapedTagField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedTagField::alias_list();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedTagField<\Tests\Feature\Fixture\Stash\SelectionSet\ScrapedTagSelectionSet>
     */
    public static function parent(): Fields\ScrapedTagField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedTagField::parent();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScrapedTagField<mixed>
     */
    public static function remote_site_id(): Fields\ScrapedTagField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScrapedTagField::remote_site_id();
    }

    /**
     * @param array<string> $alias_list
     */
    public static function new(
        string $name,
        ?string $stored_id = null,
        ?string $description = null,
        ?array $alias_list = null,
        ?ScrapedTag $parent = null,
        ?string $remote_site_id = null,
    ): self {
        $self = new self();
        $self->name = $name;
        $self->stored_id = $stored_id;
        $self->description = $description;
        $self->alias_list = $alias_list;
        $self->parent = $parent;
        $self->remote_site_id = $remote_site_id;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('name', $data)) {
            $self->name = $data['name'];
        }
        if (array_key_exists('stored_id', $data)) {
            $self->stored_id = $data['stored_id'];
        }
        if (array_key_exists('description', $data)) {
            $self->description = $data['description'];
        }
        if (array_key_exists('alias_list', $data)) {
            $self->alias_list = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['alias_list'] ?? []);
        }
        if (array_key_exists('parent', $data)) {
            $self->parent = \Tests\Feature\Fixture\Stash\ScrapedTag::fromArray($data['parent']);
        }
        if (array_key_exists('remote_site_id', $data)) {
            $self->remote_site_id = $data['remote_site_id'];
        }

        return $self;
    }
}
