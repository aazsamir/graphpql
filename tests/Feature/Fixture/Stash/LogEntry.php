<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class LogEntry implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public \DateTimeInterface $time;
    public LogLevel $level;
    public string $message;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\LogEntryField<mixed>
     */
    public static function time(): Fields\LogEntryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\LogEntryField::time();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\LogEntryField<mixed>
     */
    public static function level(): Fields\LogEntryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\LogEntryField::level();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\LogEntryField<mixed>
     */
    public static function message(): Fields\LogEntryField
    {
        return \Tests\Feature\Fixture\Stash\Fields\LogEntryField::message();
    }

    public static function new(\DateTimeInterface $time, LogLevel $level, string $message): self
    {
        $self = new self();
        $self->time = $time;
        $self->level = $level;
        $self->message = $message;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('time', $data)) {
            $self->time = new \DateTimeImmutable($data['time']);
        }
        if (array_key_exists('level', $data)) {
            $self->level = \Tests\Feature\Fixture\Stash\LogLevel::from($data['level']);
        }
        if (array_key_exists('message', $data)) {
            $self->message = $data['message'];
        }

        return $self;
    }
}
