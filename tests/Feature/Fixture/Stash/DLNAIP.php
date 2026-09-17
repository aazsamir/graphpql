<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class DLNAIP implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $ipAddress;
    public ?\DateTimeInterface $until;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\DLNAIPField<mixed>
     */
    public static function ipAddress(): Fields\DLNAIPField
    {
        return \Tests\Feature\Fixture\Stash\Fields\DLNAIPField::ipAddress();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\DLNAIPField<mixed>
     */
    public static function until(): Fields\DLNAIPField
    {
        return \Tests\Feature\Fixture\Stash\Fields\DLNAIPField::until();
    }

    public static function new(string $ipAddress, ?\DateTimeInterface $until = null): self
    {
        $self = new self();
        $self->ipAddress = $ipAddress;
        $self->until = $until;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('ipAddress', $data)) {
            $self->ipAddress = $data['ipAddress'];
        }
        if (array_key_exists('until', $data)) {
            $self->until = new \DateTimeImmutable($data['until']);
        }

        return $self;
    }
}
