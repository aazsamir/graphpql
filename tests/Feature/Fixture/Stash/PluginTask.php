<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class PluginTask implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $name;
    public ?string $description;
    public Plugin $plugin;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PluginTaskField<mixed>
     */
    public static function name(): Fields\PluginTaskField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PluginTaskField::name();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PluginTaskField<mixed>
     */
    public static function description(): Fields\PluginTaskField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PluginTaskField::description();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PluginTaskField<\Tests\Feature\Fixture\Stash\SelectionSet\PluginSelectionSet>
     */
    public static function plugin(): Fields\PluginTaskField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PluginTaskField::plugin();
    }

    public static function new(string $name, Plugin $plugin, ?string $description = null): self
    {
        $self = new self();
        $self->name = $name;
        $self->plugin = $plugin;
        $self->description = $description;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('name', $data)) {
            $self->name = $data['name'];
        }
        if (array_key_exists('plugin', $data)) {
            $self->plugin = \Tests\Feature\Fixture\Stash\Plugin::fromArray($data['plugin']);
        }
        if (array_key_exists('description', $data)) {
            $self->description = $data['description'];
        }

        return $self;
    }
}
