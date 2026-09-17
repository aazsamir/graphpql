<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class JobStatusUpdate implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public JobStatusUpdateType $type;
    public Job $job;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\JobStatusUpdateField<mixed>
     */
    public static function type(): Fields\JobStatusUpdateField
    {
        return \Tests\Feature\Fixture\Stash\Fields\JobStatusUpdateField::type();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\JobStatusUpdateField<\Tests\Feature\Fixture\Stash\SelectionSet\JobSelectionSet>
     */
    public static function job(): Fields\JobStatusUpdateField
    {
        return \Tests\Feature\Fixture\Stash\Fields\JobStatusUpdateField::job();
    }

    public static function new(JobStatusUpdateType $type, Job $job): self
    {
        $self = new self();
        $self->type = $type;
        $self->job = $job;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('type', $data)) {
            $self->type = \Tests\Feature\Fixture\Stash\JobStatusUpdateType::from($data['type']);
        }
        if (array_key_exists('job', $data)) {
            $self->job = \Tests\Feature\Fixture\Stash\Job::fromArray($data['job']);
        }

        return $self;
    }
}
