<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Countries;

class Subdivision implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $code;
    public ?string $emoji;
    public string $name;

    /**
     * @return \Tests\Feature\Fixture\Countries\Fields\SubdivisionField<mixed>
     */
    public static function code(): Fields\SubdivisionField
    {
        return \Tests\Feature\Fixture\Countries\Fields\SubdivisionField::code();
    }

    /**
     * @return \Tests\Feature\Fixture\Countries\Fields\SubdivisionField<mixed>
     */
    public static function emoji(): Fields\SubdivisionField
    {
        return \Tests\Feature\Fixture\Countries\Fields\SubdivisionField::emoji();
    }

    /**
     * @return \Tests\Feature\Fixture\Countries\Fields\SubdivisionField<mixed>
     */
    public static function name(): Fields\SubdivisionField
    {
        return \Tests\Feature\Fixture\Countries\Fields\SubdivisionField::name();
    }

    public static function new(string $code, string $name, ?string $emoji = null): self
    {
        $self = new self();
        $self->code = $code;
        $self->name = $name;
        $self->emoji = $emoji;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('code', $data)) {
            $self->code = $data['code'];
        }
        if (array_key_exists('name', $data)) {
            $self->name = $data['name'];
        }
        if (array_key_exists('emoji', $data)) {
            $self->emoji = $data['emoji'];
        }

        return $self;
    }
}
