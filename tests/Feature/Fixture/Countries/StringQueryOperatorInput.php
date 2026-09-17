<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Countries;

class StringQueryOperatorInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?string $eq;

    /** @var array<string> */
    public ?array $in;
    public ?string $ne;

    /** @var array<string> */
    public ?array $nin;
    public ?string $regex;

    /**
     * @param array<string> $in
     * @param array<string> $nin
     */
    public static function new(
        ?string $eq = null,
        ?array $in = null,
        ?string $ne = null,
        ?array $nin = null,
        ?string $regex = null,
    ): self {
        $self = new self();
        $self->eq = $eq;
        $self->in = $in;
        $self->ne = $ne;
        $self->nin = $nin;
        $self->regex = $regex;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('eq', $data)) {
            $self->eq = $data['eq'];
        }
        if (array_key_exists('in', $data)) {
            $self->in = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['in'] ?? []);
        }
        if (array_key_exists('ne', $data)) {
            $self->ne = $data['ne'];
        }
        if (array_key_exists('nin', $data)) {
            $self->nin = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['nin'] ?? []);
        }
        if (array_key_exists('regex', $data)) {
            $self->regex = $data['regex'];
        }

        return $self;
    }
}
