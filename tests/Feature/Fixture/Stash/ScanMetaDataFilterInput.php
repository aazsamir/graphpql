<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ScanMetaDataFilterInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?\DateTimeInterface $minModTime;

    public static function new(?\DateTimeInterface $minModTime = null): self
    {
        $self = new self();
        $self->minModTime = $minModTime;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('minModTime', $data)) {
            $self->minModTime = new \DateTimeImmutable($data['minModTime']);
        }

        return $self;
    }
}
