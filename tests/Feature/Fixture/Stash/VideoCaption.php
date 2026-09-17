<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class VideoCaption implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $language_code;
    public string $caption_type;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\VideoCaptionField<mixed>
     */
    public static function language_code(): Fields\VideoCaptionField
    {
        return \Tests\Feature\Fixture\Stash\Fields\VideoCaptionField::language_code();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\VideoCaptionField<mixed>
     */
    public static function caption_type(): Fields\VideoCaptionField
    {
        return \Tests\Feature\Fixture\Stash\Fields\VideoCaptionField::caption_type();
    }

    public static function new(string $language_code, string $caption_type): self
    {
        $self = new self();
        $self->language_code = $language_code;
        $self->caption_type = $caption_type;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('language_code', $data)) {
            $self->language_code = $data['language_code'];
        }
        if (array_key_exists('caption_type', $data)) {
            $self->caption_type = $data['caption_type'];
        }

        return $self;
    }
}
