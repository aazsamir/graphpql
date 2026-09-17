<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class StatsResultType implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public int $scene_count;
    public float $scenes_size;
    public float $scenes_duration;
    public int $image_count;
    public float $images_size;
    public int $gallery_count;
    public int $performer_count;
    public int $studio_count;
    public int $group_count;
    public int $movie_count;
    public int $tag_count;
    public int $total_o_count;
    public float $total_play_duration;
    public int $total_play_count;
    public int $scenes_played;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StatsResultTypeField<mixed>
     */
    public static function scene_count(): Fields\StatsResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StatsResultTypeField::scene_count();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StatsResultTypeField<mixed>
     */
    public static function scenes_size(): Fields\StatsResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StatsResultTypeField::scenes_size();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StatsResultTypeField<mixed>
     */
    public static function scenes_duration(): Fields\StatsResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StatsResultTypeField::scenes_duration();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StatsResultTypeField<mixed>
     */
    public static function image_count(): Fields\StatsResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StatsResultTypeField::image_count();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StatsResultTypeField<mixed>
     */
    public static function images_size(): Fields\StatsResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StatsResultTypeField::images_size();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StatsResultTypeField<mixed>
     */
    public static function gallery_count(): Fields\StatsResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StatsResultTypeField::gallery_count();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StatsResultTypeField<mixed>
     */
    public static function performer_count(): Fields\StatsResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StatsResultTypeField::performer_count();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StatsResultTypeField<mixed>
     */
    public static function studio_count(): Fields\StatsResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StatsResultTypeField::studio_count();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StatsResultTypeField<mixed>
     */
    public static function group_count(): Fields\StatsResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StatsResultTypeField::group_count();
    }

    /**
     * @deprecated use group_count instead
     * @return \Tests\Feature\Fixture\Stash\Fields\StatsResultTypeField<mixed>
     */
    public static function movie_count(): Fields\StatsResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StatsResultTypeField::movie_count();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StatsResultTypeField<mixed>
     */
    public static function tag_count(): Fields\StatsResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StatsResultTypeField::tag_count();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StatsResultTypeField<mixed>
     */
    public static function total_o_count(): Fields\StatsResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StatsResultTypeField::total_o_count();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StatsResultTypeField<mixed>
     */
    public static function total_play_duration(): Fields\StatsResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StatsResultTypeField::total_play_duration();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StatsResultTypeField<mixed>
     */
    public static function total_play_count(): Fields\StatsResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StatsResultTypeField::total_play_count();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StatsResultTypeField<mixed>
     */
    public static function scenes_played(): Fields\StatsResultTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StatsResultTypeField::scenes_played();
    }

    public static function new(
        int $scene_count,
        float $scenes_size,
        float $scenes_duration,
        int $image_count,
        float $images_size,
        int $gallery_count,
        int $performer_count,
        int $studio_count,
        int $group_count,
        int $movie_count,
        int $tag_count,
        int $total_o_count,
        float $total_play_duration,
        int $total_play_count,
        int $scenes_played,
    ): self {
        $self = new self();
        $self->scene_count = $scene_count;
        $self->scenes_size = $scenes_size;
        $self->scenes_duration = $scenes_duration;
        $self->image_count = $image_count;
        $self->images_size = $images_size;
        $self->gallery_count = $gallery_count;
        $self->performer_count = $performer_count;
        $self->studio_count = $studio_count;
        $self->group_count = $group_count;
        $self->movie_count = $movie_count;
        $self->tag_count = $tag_count;
        $self->total_o_count = $total_o_count;
        $self->total_play_duration = $total_play_duration;
        $self->total_play_count = $total_play_count;
        $self->scenes_played = $scenes_played;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('scene_count', $data)) {
            $self->scene_count = $data['scene_count'];
        }
        if (array_key_exists('scenes_size', $data)) {
            $self->scenes_size = $data['scenes_size'];
        }
        if (array_key_exists('scenes_duration', $data)) {
            $self->scenes_duration = $data['scenes_duration'];
        }
        if (array_key_exists('image_count', $data)) {
            $self->image_count = $data['image_count'];
        }
        if (array_key_exists('images_size', $data)) {
            $self->images_size = $data['images_size'];
        }
        if (array_key_exists('gallery_count', $data)) {
            $self->gallery_count = $data['gallery_count'];
        }
        if (array_key_exists('performer_count', $data)) {
            $self->performer_count = $data['performer_count'];
        }
        if (array_key_exists('studio_count', $data)) {
            $self->studio_count = $data['studio_count'];
        }
        if (array_key_exists('group_count', $data)) {
            $self->group_count = $data['group_count'];
        }
        if (array_key_exists('movie_count', $data)) {
            $self->movie_count = $data['movie_count'];
        }
        if (array_key_exists('tag_count', $data)) {
            $self->tag_count = $data['tag_count'];
        }
        if (array_key_exists('total_o_count', $data)) {
            $self->total_o_count = $data['total_o_count'];
        }
        if (array_key_exists('total_play_duration', $data)) {
            $self->total_play_duration = $data['total_play_duration'];
        }
        if (array_key_exists('total_play_count', $data)) {
            $self->total_play_count = $data['total_play_count'];
        }
        if (array_key_exists('scenes_played', $data)) {
            $self->scenes_played = $data['scenes_played'];
        }

        return $self;
    }
}
