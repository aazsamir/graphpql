<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ConfigDLNAResult implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $serverName;
    public bool $enabled;
    public int $port;

    /** @var array<string> */
    public array $whitelistedIPs;

    /** @var array<string> */
    public array $interfaces;
    public string $videoSortOrder;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ConfigDLNAResultField<mixed>
     */
    public static function serverName(): Fields\ConfigDLNAResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ConfigDLNAResultField::serverName();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ConfigDLNAResultField<mixed>
     */
    public static function enabled(): Fields\ConfigDLNAResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ConfigDLNAResultField::enabled();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ConfigDLNAResultField<mixed>
     */
    public static function port(): Fields\ConfigDLNAResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ConfigDLNAResultField::port();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ConfigDLNAResultField<mixed>
     */
    public static function whitelistedIPs(): Fields\ConfigDLNAResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ConfigDLNAResultField::whitelistedIPs();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ConfigDLNAResultField<mixed>
     */
    public static function interfaces(): Fields\ConfigDLNAResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ConfigDLNAResultField::interfaces();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ConfigDLNAResultField<mixed>
     */
    public static function videoSortOrder(): Fields\ConfigDLNAResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ConfigDLNAResultField::videoSortOrder();
    }

    /**
     * @param array<string> $whitelistedIPs
     * @param array<string> $interfaces
     */
    public static function new(
        string $serverName,
        bool $enabled,
        int $port,
        array $whitelistedIPs,
        array $interfaces,
        string $videoSortOrder,
    ): self {
        $self = new self();
        $self->serverName = $serverName;
        $self->enabled = $enabled;
        $self->port = $port;
        $self->whitelistedIPs = $whitelistedIPs;
        $self->interfaces = $interfaces;
        $self->videoSortOrder = $videoSortOrder;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('serverName', $data)) {
            $self->serverName = $data['serverName'];
        }
        if (array_key_exists('enabled', $data)) {
            $self->enabled = $data['enabled'];
        }
        if (array_key_exists('port', $data)) {
            $self->port = $data['port'];
        }
        if (array_key_exists('whitelistedIPs', $data)) {
            $self->whitelistedIPs = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['whitelistedIPs'] ?? []);
        }
        if (array_key_exists('interfaces', $data)) {
            $self->interfaces = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['interfaces'] ?? []);
        }
        if (array_key_exists('videoSortOrder', $data)) {
            $self->videoSortOrder = $data['videoSortOrder'];
        }

        return $self;
    }
}
