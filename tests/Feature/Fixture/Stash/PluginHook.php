<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class PluginHook implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $name;
    public ?string $description;

    /** @var array<string> */
    public ?array $hooks;
    public Plugin $plugin;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PluginHookField<mixed>
     */
    public static function name(): Fields\PluginHookField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PluginHookField::name();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PluginHookField<mixed>
     */
    public static function description(): Fields\PluginHookField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PluginHookField::description();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PluginHookField<mixed>
     */
    public static function hooks(): Fields\PluginHookField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PluginHookField::hooks();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PluginHookField<\Tests\Feature\Fixture\Stash\SelectionSet\PluginSelectionSet>
     */
    public static function plugin(): Fields\PluginHookField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PluginHookField::plugin();
    }

    /**
     * @param array<string> $hooks
     */
    public static function new(string $name, Plugin $plugin, ?string $description = null, ?array $hooks = null): self
    {
        $self = new self();
        $self->name = $name;
        $self->plugin = $plugin;
        $self->description = $description;
        $self->hooks = $hooks;

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
        if (array_key_exists('hooks', $data)) {
            $self->hooks = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['hooks'] ?? []);
        }

        return $self;
    }
}
