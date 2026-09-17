<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class PluginPaths implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    /** @var array<string> */
    public ?array $javascript;

    /** @var array<string> */
    public ?array $css;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PluginPathsField<mixed>
     */
    public static function javascript(): Fields\PluginPathsField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PluginPathsField::javascript();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PluginPathsField<mixed>
     */
    public static function css(): Fields\PluginPathsField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PluginPathsField::css();
    }

    /**
     * @param array<string> $javascript
     * @param array<string> $css
     */
    public static function new(?array $javascript = null, ?array $css = null): self
    {
        $self = new self();
        $self->javascript = $javascript;
        $self->css = $css;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('javascript', $data)) {
            $self->javascript = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['javascript'] ?? []);
        }
        if (array_key_exists('css', $data)) {
            $self->css = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['css'] ?? []);
        }

        return $self;
    }
}
