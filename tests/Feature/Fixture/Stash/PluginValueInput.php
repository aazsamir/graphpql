<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class PluginValueInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?string $str;
    public ?int $i;
    public ?bool $b;
    public ?float $f;

    /** @var array<\Tests\Feature\Fixture\Stash\PluginArgInput> */
    public ?array $o;

    /** @var array<\Tests\Feature\Fixture\Stash\PluginValueInput> */
    public ?array $a;

    /**
     * @param array<\Tests\Feature\Fixture\Stash\PluginArgInput> $o
     * @param array<\Tests\Feature\Fixture\Stash\PluginValueInput> $a
     */
    public static function new(
        ?string $str = null,
        ?int $i = null,
        ?bool $b = null,
        ?float $f = null,
        ?array $o = null,
        ?array $a = null,
    ): self {
        $self = new self();
        $self->str = $str;
        $self->i = $i;
        $self->b = $b;
        $self->f = $f;
        $self->o = $o;
        $self->a = $a;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('str', $data)) {
            $self->str = $data['str'];
        }
        if (array_key_exists('i', $data)) {
            $self->i = $data['i'];
        }
        if (array_key_exists('b', $data)) {
            $self->b = $data['b'];
        }
        if (array_key_exists('f', $data)) {
            $self->f = $data['f'];
        }
        if (array_key_exists('o', $data)) {
            $self->o = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\PluginArgInput::fromArray($data);
            }, $data['o'] ?? []);
        }
        if (array_key_exists('a', $data)) {
            $self->a = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\PluginValueInput::fromArray($data);
            }, $data['a'] ?? []);
        }

        return $self;
    }
}
