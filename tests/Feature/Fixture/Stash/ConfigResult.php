<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ConfigResult implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ConfigGeneralResult $general;
    public ConfigInterfaceResult $interface;
    public ConfigDLNAResult $dlna;
    public ConfigScrapingResult $scraping;
    public ConfigDefaultSettingsResult $defaults;
    public mixed $ui;
    public mixed $plugins;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ConfigResultField<\Tests\Feature\Fixture\Stash\SelectionSet\ConfigGeneralResultSelectionSet>
     */
    public static function general(): Fields\ConfigResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ConfigResultField::general();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ConfigResultField<\Tests\Feature\Fixture\Stash\SelectionSet\ConfigInterfaceResultSelectionSet>
     */
    public static function interface(): Fields\ConfigResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ConfigResultField::interface();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ConfigResultField<\Tests\Feature\Fixture\Stash\SelectionSet\ConfigDLNAResultSelectionSet>
     */
    public static function dlna(): Fields\ConfigResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ConfigResultField::dlna();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ConfigResultField<\Tests\Feature\Fixture\Stash\SelectionSet\ConfigScrapingResultSelectionSet>
     */
    public static function scraping(): Fields\ConfigResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ConfigResultField::scraping();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ConfigResultField<\Tests\Feature\Fixture\Stash\SelectionSet\ConfigDefaultSettingsResultSelectionSet>
     */
    public static function defaults(): Fields\ConfigResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ConfigResultField::defaults();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ConfigResultField<mixed>
     */
    public static function ui(): Fields\ConfigResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ConfigResultField::ui();
    }

    /**
     * @param array<string> $include
     * @return \Tests\Feature\Fixture\Stash\Fields\ConfigResultField<mixed>
     */
    public static function plugins(?array $include): Fields\ConfigResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ConfigResultField::plugins($include,);
    }

    public static function new(
        ConfigGeneralResult $general,
        ConfigInterfaceResult $interface,
        ConfigDLNAResult $dlna,
        ConfigScrapingResult $scraping,
        ConfigDefaultSettingsResult $defaults,
        mixed $ui,
        mixed $plugins,
    ): self {
        $self = new self();
        $self->general = $general;
        $self->interface = $interface;
        $self->dlna = $dlna;
        $self->scraping = $scraping;
        $self->defaults = $defaults;
        $self->ui = $ui;
        $self->plugins = $plugins;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('general', $data)) {
            $self->general = \Tests\Feature\Fixture\Stash\ConfigGeneralResult::fromArray($data['general']);
        }
        if (array_key_exists('interface', $data)) {
            $self->interface = \Tests\Feature\Fixture\Stash\ConfigInterfaceResult::fromArray($data['interface']);
        }
        if (array_key_exists('dlna', $data)) {
            $self->dlna = \Tests\Feature\Fixture\Stash\ConfigDLNAResult::fromArray($data['dlna']);
        }
        if (array_key_exists('scraping', $data)) {
            $self->scraping = \Tests\Feature\Fixture\Stash\ConfigScrapingResult::fromArray($data['scraping']);
        }
        if (array_key_exists('defaults', $data)) {
            $self->defaults = \Tests\Feature\Fixture\Stash\ConfigDefaultSettingsResult::fromArray($data['defaults']);
        }
        if (array_key_exists('ui', $data)) {
            $self->ui = $data['ui'];
        }
        if (array_key_exists('plugins', $data)) {
            $self->plugins = $data['plugins'];
        }

        return $self;
    }
}
