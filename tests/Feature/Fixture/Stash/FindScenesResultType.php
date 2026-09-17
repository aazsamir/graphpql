<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class FindScenesResultType implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public int $count;
    public float $duration;
    public float $filesize;

    /** @var array<\Tests\Feature\Fixture\Stash\Scene> */
    public array $scenes;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\FindScenesResultTypeField<mixed>
     */
    public static function count(): Fields\FindScenesResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\FindScenesResultTypeField::count();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\FindScenesResultTypeField<mixed>
     */
    public static function duration(): Fields\FindScenesResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\FindScenesResultTypeField::duration();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\FindScenesResultTypeField<mixed>
     */
    public static function filesize(): Fields\FindScenesResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\FindScenesResultTypeField::filesize();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\FindScenesResultTypeField<\Tests\Feature\Fixture\Stash\SelectionSet\SceneSelectionSet>
     */
    public static function scenes(): Fields\FindScenesResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\FindScenesResultTypeField::scenes();
    }

    /**
     * @param array<\Tests\Feature\Fixture\Stash\Scene> $scenes
     */
    public static function new(int $count, float $duration, float $filesize, array $scenes): self
    {
        $self = new self();
        $self->count = $count;
        $self->duration = $duration;
        $self->filesize = $filesize;
        $self->scenes = $scenes;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('count', $data)) {
            $self->count = $data['count'];
        }
        if (array_key_exists('duration', $data)) {
            $self->duration = $data['duration'];
        }
        if (array_key_exists('filesize', $data)) {
            $self->filesize = $data['filesize'];
        }
        if (array_key_exists('scenes', $data)) {
            $self->scenes = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\Scene::fromArray($data);
            }, $data['scenes'] ?? []);
        }

        return $self;
    }
}
