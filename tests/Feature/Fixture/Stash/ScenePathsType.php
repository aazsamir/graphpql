<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ScenePathsType implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?string $screenshot;
    public ?string $preview;
    public ?string $stream;
    public ?string $webp;
    public ?string $vtt;
    public ?string $sprite;
    public ?string $funscript;
    public ?string $interactive_heatmap;
    public ?string $caption;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScenePathsTypeField<mixed>
     */
    public static function screenshot(): Fields\ScenePathsTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScenePathsTypeField::screenshot();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScenePathsTypeField<mixed>
     */
    public static function preview(): Fields\ScenePathsTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScenePathsTypeField::preview();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScenePathsTypeField<mixed>
     */
    public static function stream(): Fields\ScenePathsTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScenePathsTypeField::stream();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScenePathsTypeField<mixed>
     */
    public static function webp(): Fields\ScenePathsTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScenePathsTypeField::webp();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScenePathsTypeField<mixed>
     */
    public static function vtt(): Fields\ScenePathsTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScenePathsTypeField::vtt();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScenePathsTypeField<mixed>
     */
    public static function sprite(): Fields\ScenePathsTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScenePathsTypeField::sprite();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScenePathsTypeField<mixed>
     */
    public static function funscript(): Fields\ScenePathsTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScenePathsTypeField::funscript();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScenePathsTypeField<mixed>
     */
    public static function interactive_heatmap(): Fields\ScenePathsTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScenePathsTypeField::interactive_heatmap();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ScenePathsTypeField<mixed>
     */
    public static function caption(): Fields\ScenePathsTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ScenePathsTypeField::caption();
    }

    public static function new(
        ?string $screenshot = null,
        ?string $preview = null,
        ?string $stream = null,
        ?string $webp = null,
        ?string $vtt = null,
        ?string $sprite = null,
        ?string $funscript = null,
        ?string $interactive_heatmap = null,
        ?string $caption = null,
    ): self {
        $self = new self();
        $self->screenshot = $screenshot;
        $self->preview = $preview;
        $self->stream = $stream;
        $self->webp = $webp;
        $self->vtt = $vtt;
        $self->sprite = $sprite;
        $self->funscript = $funscript;
        $self->interactive_heatmap = $interactive_heatmap;
        $self->caption = $caption;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('screenshot', $data)) {
            $self->screenshot = $data['screenshot'];
        }
        if (array_key_exists('preview', $data)) {
            $self->preview = $data['preview'];
        }
        if (array_key_exists('stream', $data)) {
            $self->stream = $data['stream'];
        }
        if (array_key_exists('webp', $data)) {
            $self->webp = $data['webp'];
        }
        if (array_key_exists('vtt', $data)) {
            $self->vtt = $data['vtt'];
        }
        if (array_key_exists('sprite', $data)) {
            $self->sprite = $data['sprite'];
        }
        if (array_key_exists('funscript', $data)) {
            $self->funscript = $data['funscript'];
        }
        if (array_key_exists('interactive_heatmap', $data)) {
            $self->interactive_heatmap = $data['interactive_heatmap'];
        }
        if (array_key_exists('caption', $data)) {
            $self->caption = $data['caption'];
        }

        return $self;
    }
}
