<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class DLNAStatus implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public bool $running;
    public ?\DateTimeInterface $until;

    /** @var array<string> */
    public array $recentIPAddresses;

    /** @var array<\Tests\Feature\Fixture\Stash\DLNAIP> */
    public array $allowedIPAddresses;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\DLNAStatusField<mixed>
     */
    public static function running(): Fields\DLNAStatusField
    {
        return \Tests\Feature\Fixture\Stash\Fields\DLNAStatusField::running();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\DLNAStatusField<mixed>
     */
    public static function until(): Fields\DLNAStatusField
    {
        return \Tests\Feature\Fixture\Stash\Fields\DLNAStatusField::until();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\DLNAStatusField<mixed>
     */
    public static function recentIPAddresses(): Fields\DLNAStatusField
    {
        return \Tests\Feature\Fixture\Stash\Fields\DLNAStatusField::recentIPAddresses();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\DLNAStatusField<\Tests\Feature\Fixture\Stash\SelectionSet\DLNAIPSelectionSet>
     */
    public static function allowedIPAddresses(): Fields\DLNAStatusField
    {
        return \Tests\Feature\Fixture\Stash\Fields\DLNAStatusField::allowedIPAddresses();
    }

    /**
     * @param array<string> $recentIPAddresses
     * @param array<\Tests\Feature\Fixture\Stash\DLNAIP> $allowedIPAddresses
     */
    public static function new(
        bool $running,
        array $recentIPAddresses,
        array $allowedIPAddresses,
        ?\DateTimeInterface $until = null,
    ): self {
        $self = new self();
        $self->running = $running;
        $self->recentIPAddresses = $recentIPAddresses;
        $self->allowedIPAddresses = $allowedIPAddresses;
        $self->until = $until;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('running', $data)) {
            $self->running = $data['running'];
        }
        if (array_key_exists('recentIPAddresses', $data)) {
            $self->recentIPAddresses = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['recentIPAddresses'] ?? []);
        }
        if (array_key_exists('allowedIPAddresses', $data)) {
            $self->allowedIPAddresses = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\DLNAIP::fromArray($data);
            }, $data['allowedIPAddresses'] ?? []);
        }
        if (array_key_exists('until', $data)) {
            $self->until = new \DateTimeImmutable($data['until']);
        }

        return $self;
    }
}
