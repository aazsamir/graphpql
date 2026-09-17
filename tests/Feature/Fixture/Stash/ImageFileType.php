<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ImageFileType implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public \DateTimeInterface $mod_time;
    public int $size;
    public int $width;
    public int $height;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ImageFileTypeField<mixed>
     */
    public static function mod_time(): Fields\ImageFileTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ImageFileTypeField::mod_time();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ImageFileTypeField<mixed>
     */
    public static function size(): Fields\ImageFileTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ImageFileTypeField::size();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ImageFileTypeField<mixed>
     */
    public static function width(): Fields\ImageFileTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ImageFileTypeField::width();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ImageFileTypeField<mixed>
     */
    public static function height(): Fields\ImageFileTypeField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ImageFileTypeField::height();
    }

    public static function new(\DateTimeInterface $mod_time, int $size, int $width, int $height): self
    {
        $self = new self();
        $self->mod_time = $mod_time;
        $self->size = $size;
        $self->width = $width;
        $self->height = $height;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('mod_time', $data)) {
            $self->mod_time = new \DateTimeImmutable($data['mod_time']);
        }
        if (array_key_exists('size', $data)) {
            $self->size = $data['size'];
        }
        if (array_key_exists('width', $data)) {
            $self->width = $data['width'];
        }
        if (array_key_exists('height', $data)) {
            $self->height = $data['height'];
        }

        return $self;
    }
}
