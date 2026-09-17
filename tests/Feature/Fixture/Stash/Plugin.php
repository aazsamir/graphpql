<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class Plugin implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $id;
    public string $name;
    public ?string $description;
    public ?string $url;
    public ?string $version;
    public bool $enabled;

    /** @var array<\Tests\Feature\Fixture\Stash\PluginTask> */
    public ?array $tasks;

    /** @var array<\Tests\Feature\Fixture\Stash\PluginHook> */
    public ?array $hooks;

    /** @var array<\Tests\Feature\Fixture\Stash\PluginSetting> */
    public ?array $settings;

    /** @var array<string> */
    public ?array $requires;
    public PluginPaths $paths;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PluginField<mixed>
     */
    public static function id(): Fields\PluginField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PluginField::id();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PluginField<mixed>
     */
    public static function name(): Fields\PluginField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PluginField::name();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PluginField<mixed>
     */
    public static function description(): Fields\PluginField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PluginField::description();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PluginField<mixed>
     */
    public static function url(): Fields\PluginField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PluginField::url();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PluginField<mixed>
     */
    public static function version(): Fields\PluginField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PluginField::version();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PluginField<mixed>
     */
    public static function enabled(): Fields\PluginField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PluginField::enabled();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PluginField<\Tests\Feature\Fixture\Stash\SelectionSet\PluginTaskSelectionSet>
     */
    public static function tasks(): Fields\PluginField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PluginField::tasks();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PluginField<\Tests\Feature\Fixture\Stash\SelectionSet\PluginHookSelectionSet>
     */
    public static function hooks(): Fields\PluginField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PluginField::hooks();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PluginField<\Tests\Feature\Fixture\Stash\SelectionSet\PluginSettingSelectionSet>
     */
    public static function settings(): Fields\PluginField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PluginField::settings();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PluginField<mixed>
     */
    public static function requires(): Fields\PluginField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PluginField::requires();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PluginField<\Tests\Feature\Fixture\Stash\SelectionSet\PluginPathsSelectionSet>
     */
    public static function paths(): Fields\PluginField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PluginField::paths();
    }

    /**
     * @param array<\Tests\Feature\Fixture\Stash\PluginTask> $tasks
     * @param array<\Tests\Feature\Fixture\Stash\PluginHook> $hooks
     * @param array<\Tests\Feature\Fixture\Stash\PluginSetting> $settings
     * @param array<string> $requires
     */
    public static function new(
        string $id,
        string $name,
        bool $enabled,
        PluginPaths $paths,
        ?string $description = null,
        ?string $url = null,
        ?string $version = null,
        ?array $tasks = null,
        ?array $hooks = null,
        ?array $settings = null,
        ?array $requires = null,
    ): self {
        $self = new self();
        $self->id = $id;
        $self->name = $name;
        $self->enabled = $enabled;
        $self->paths = $paths;
        $self->description = $description;
        $self->url = $url;
        $self->version = $version;
        $self->tasks = $tasks;
        $self->hooks = $hooks;
        $self->settings = $settings;
        $self->requires = $requires;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('id', $data)) {
            $self->id = $data['id'];
        }
        if (array_key_exists('name', $data)) {
            $self->name = $data['name'];
        }
        if (array_key_exists('enabled', $data)) {
            $self->enabled = $data['enabled'];
        }
        if (array_key_exists('paths', $data)) {
            $self->paths = \Tests\Feature\Fixture\Stash\PluginPaths::fromArray($data['paths']);
        }
        if (array_key_exists('description', $data)) {
            $self->description = $data['description'];
        }
        if (array_key_exists('url', $data)) {
            $self->url = $data['url'];
        }
        if (array_key_exists('version', $data)) {
            $self->version = $data['version'];
        }
        if (array_key_exists('tasks', $data)) {
            $self->tasks = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\PluginTask::fromArray($data);
            }, $data['tasks'] ?? []);
        }
        if (array_key_exists('hooks', $data)) {
            $self->hooks = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\PluginHook::fromArray($data);
            }, $data['hooks'] ?? []);
        }
        if (array_key_exists('settings', $data)) {
            $self->settings = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\PluginSetting::fromArray($data);
            }, $data['settings'] ?? []);
        }
        if (array_key_exists('requires', $data)) {
            $self->requires = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['requires'] ?? []);
        }

        return $self;
    }
}
