<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ImportObjectsInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public mixed $file;
    public ImportDuplicateEnum $duplicateBehaviour;
    public ImportMissingRefEnum $missingRefBehaviour;

    public static function new(
        mixed $file,
        ImportDuplicateEnum $duplicateBehaviour,
        ImportMissingRefEnum $missingRefBehaviour,
    ): self {
        $self = new self();
        $self->file = $file;
        $self->duplicateBehaviour = $duplicateBehaviour;
        $self->missingRefBehaviour = $missingRefBehaviour;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('file', $data)) {
            $self->file = $data['file'];
        }
        if (array_key_exists('duplicateBehaviour', $data)) {
            $self->duplicateBehaviour = \Tests\Feature\Fixture\Stash\ImportDuplicateEnum::from($data['duplicateBehaviour']);
        }
        if (array_key_exists('missingRefBehaviour', $data)) {
            $self->missingRefBehaviour = \Tests\Feature\Fixture\Stash\ImportMissingRefEnum::from($data['missingRefBehaviour']);
        }

        return $self;
    }
}
