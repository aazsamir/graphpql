<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class SystemStatus implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?int $databaseSchema;
    public ?string $databasePath;
    public ?string $configPath;
    public int $appSchema;
    public SystemStatusEnum $status;
    public string $os;
    public string $workingDir;
    public string $homeDir;
    public ?string $ffmpegPath;
    public ?string $ffprobePath;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SystemStatusField<mixed>
     */
    public static function databaseSchema(): Fields\SystemStatusField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SystemStatusField::databaseSchema();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SystemStatusField<mixed>
     */
    public static function databasePath(): Fields\SystemStatusField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SystemStatusField::databasePath();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SystemStatusField<mixed>
     */
    public static function configPath(): Fields\SystemStatusField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SystemStatusField::configPath();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SystemStatusField<mixed>
     */
    public static function appSchema(): Fields\SystemStatusField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SystemStatusField::appSchema();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SystemStatusField<mixed>
     */
    public static function status(): Fields\SystemStatusField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SystemStatusField::status();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SystemStatusField<mixed>
     */
    public static function os(): Fields\SystemStatusField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SystemStatusField::os();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SystemStatusField<mixed>
     */
    public static function workingDir(): Fields\SystemStatusField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SystemStatusField::workingDir();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SystemStatusField<mixed>
     */
    public static function homeDir(): Fields\SystemStatusField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SystemStatusField::homeDir();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SystemStatusField<mixed>
     */
    public static function ffmpegPath(): Fields\SystemStatusField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SystemStatusField::ffmpegPath();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\SystemStatusField<mixed>
     */
    public static function ffprobePath(): Fields\SystemStatusField
    {
        return \Tests\Feature\Fixture\Stash\Fields\SystemStatusField::ffprobePath();
    }

    public static function new(
        int $appSchema,
        SystemStatusEnum $status,
        string $os,
        string $workingDir,
        string $homeDir,
        ?int $databaseSchema = null,
        ?string $databasePath = null,
        ?string $configPath = null,
        ?string $ffmpegPath = null,
        ?string $ffprobePath = null,
    ): self {
        $self = new self();
        $self->appSchema = $appSchema;
        $self->status = $status;
        $self->os = $os;
        $self->workingDir = $workingDir;
        $self->homeDir = $homeDir;
        $self->databaseSchema = $databaseSchema;
        $self->databasePath = $databasePath;
        $self->configPath = $configPath;
        $self->ffmpegPath = $ffmpegPath;
        $self->ffprobePath = $ffprobePath;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('appSchema', $data)) {
            $self->appSchema = $data['appSchema'];
        }
        if (array_key_exists('status', $data)) {
            $self->status = \Tests\Feature\Fixture\Stash\SystemStatusEnum::from($data['status']);
        }
        if (array_key_exists('os', $data)) {
            $self->os = $data['os'];
        }
        if (array_key_exists('workingDir', $data)) {
            $self->workingDir = $data['workingDir'];
        }
        if (array_key_exists('homeDir', $data)) {
            $self->homeDir = $data['homeDir'];
        }
        if (array_key_exists('databaseSchema', $data)) {
            $self->databaseSchema = $data['databaseSchema'];
        }
        if (array_key_exists('databasePath', $data)) {
            $self->databasePath = $data['databasePath'];
        }
        if (array_key_exists('configPath', $data)) {
            $self->configPath = $data['configPath'];
        }
        if (array_key_exists('ffmpegPath', $data)) {
            $self->ffmpegPath = $data['ffmpegPath'];
        }
        if (array_key_exists('ffprobePath', $data)) {
            $self->ffprobePath = $data['ffprobePath'];
        }

        return $self;
    }
}
