<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class StashID implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $endpoint;
    public string $stash_id;
    public \DateTimeInterface $updated_at;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StashIDField<mixed>
     */
    public static function endpoint(): Fields\StashIDField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StashIDField::endpoint();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StashIDField<mixed>
     */
    public static function stash_id(): Fields\StashIDField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StashIDField::stash_id();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\StashIDField<mixed>
     */
    public static function updated_at(): Fields\StashIDField
    {
        return \Tests\Feature\Fixture\Stash\Fields\StashIDField::updated_at();
    }

    public static function new(string $endpoint, string $stash_id, \DateTimeInterface $updated_at): self
    {
        $self = new self();
        $self->endpoint = $endpoint;
        $self->stash_id = $stash_id;
        $self->updated_at = $updated_at;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('endpoint', $data)) {
            $self->endpoint = $data['endpoint'];
        }
        if (array_key_exists('stash_id', $data)) {
            $self->stash_id = $data['stash_id'];
        }
        if (array_key_exists('updated_at', $data)) {
            $self->updated_at = new \DateTimeImmutable($data['updated_at']);
        }

        return $self;
    }
}
