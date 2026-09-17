<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ConfigDefaultSettingsResult implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?ScanMetadataOptions $scan;
    public ?IdentifyMetadataTaskOptions $identify;
    public ?AutoTagMetadataOptions $autoTag;
    public ?GenerateMetadataOptions $generate;
    public ?bool $deleteFile;
    public ?bool $deleteGenerated;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ConfigDefaultSettingsResultField<\Tests\Feature\Fixture\Stash\SelectionSet\ScanMetadataOptionsSelectionSet>
     */
    public static function scan(): Fields\ConfigDefaultSettingsResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ConfigDefaultSettingsResultField::scan();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ConfigDefaultSettingsResultField<\Tests\Feature\Fixture\Stash\SelectionSet\IdentifyMetadataTaskOptionsSelectionSet>
     */
    public static function identify(): Fields\ConfigDefaultSettingsResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ConfigDefaultSettingsResultField::identify();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ConfigDefaultSettingsResultField<\Tests\Feature\Fixture\Stash\SelectionSet\AutoTagMetadataOptionsSelectionSet>
     */
    public static function autoTag(): Fields\ConfigDefaultSettingsResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ConfigDefaultSettingsResultField::autoTag();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ConfigDefaultSettingsResultField<\Tests\Feature\Fixture\Stash\SelectionSet\GenerateMetadataOptionsSelectionSet>
     */
    public static function generate(): Fields\ConfigDefaultSettingsResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ConfigDefaultSettingsResultField::generate();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ConfigDefaultSettingsResultField<mixed>
     */
    public static function deleteFile(): Fields\ConfigDefaultSettingsResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ConfigDefaultSettingsResultField::deleteFile();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ConfigDefaultSettingsResultField<mixed>
     */
    public static function deleteGenerated(): Fields\ConfigDefaultSettingsResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ConfigDefaultSettingsResultField::deleteGenerated();
    }

    public static function new(
        ?ScanMetadataOptions $scan = null,
        ?IdentifyMetadataTaskOptions $identify = null,
        ?AutoTagMetadataOptions $autoTag = null,
        ?GenerateMetadataOptions $generate = null,
        ?bool $deleteFile = null,
        ?bool $deleteGenerated = null,
    ): self {
        $self = new self();
        $self->scan = $scan;
        $self->identify = $identify;
        $self->autoTag = $autoTag;
        $self->generate = $generate;
        $self->deleteFile = $deleteFile;
        $self->deleteGenerated = $deleteGenerated;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('scan', $data)) {
            $self->scan = \Tests\Feature\Fixture\Stash\ScanMetadataOptions::fromArray($data['scan']);
        }
        if (array_key_exists('identify', $data)) {
            $self->identify = \Tests\Feature\Fixture\Stash\IdentifyMetadataTaskOptions::fromArray($data['identify']);
        }
        if (array_key_exists('autoTag', $data)) {
            $self->autoTag = \Tests\Feature\Fixture\Stash\AutoTagMetadataOptions::fromArray($data['autoTag']);
        }
        if (array_key_exists('generate', $data)) {
            $self->generate = \Tests\Feature\Fixture\Stash\GenerateMetadataOptions::fromArray($data['generate']);
        }
        if (array_key_exists('deleteFile', $data)) {
            $self->deleteFile = $data['deleteFile'];
        }
        if (array_key_exists('deleteGenerated', $data)) {
            $self->deleteGenerated = $data['deleteGenerated'];
        }

        return $self;
    }
}
