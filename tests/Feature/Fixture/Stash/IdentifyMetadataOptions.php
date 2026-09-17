<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class IdentifyMetadataOptions implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    /** @var array<\Tests\Feature\Fixture\Stash\IdentifyFieldOptions> */
    public ?array $fieldOptions;
    public ?bool $setCoverImage;
    public ?bool $setOrganized;
    public ?bool $includeMalePerformers;

    /** @var array<\Tests\Feature\Fixture\Stash\GenderEnum> */
    public ?array $performerGenders;
    public ?bool $skipMultipleMatches;
    public ?string $skipMultipleMatchTag;
    public ?bool $skipSingleNamePerformers;
    public ?string $skipSingleNamePerformerTag;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\IdentifyMetadataOptionsField<\Tests\Feature\Fixture\Stash\SelectionSet\IdentifyFieldOptionsSelectionSet>
     */
    public static function fieldOptions(): Fields\IdentifyMetadataOptionsField
    {
        return \Tests\Feature\Fixture\Stash\Fields\IdentifyMetadataOptionsField::fieldOptions();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\IdentifyMetadataOptionsField<mixed>
     */
    public static function setCoverImage(): Fields\IdentifyMetadataOptionsField
    {
        return \Tests\Feature\Fixture\Stash\Fields\IdentifyMetadataOptionsField::setCoverImage();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\IdentifyMetadataOptionsField<mixed>
     */
    public static function setOrganized(): Fields\IdentifyMetadataOptionsField
    {
        return \Tests\Feature\Fixture\Stash\Fields\IdentifyMetadataOptionsField::setOrganized();
    }

    /**
     * @deprecated Use performerGenders
     * @return \Tests\Feature\Fixture\Stash\Fields\IdentifyMetadataOptionsField<mixed>
     */
    public static function includeMalePerformers(): Fields\IdentifyMetadataOptionsField
    {
        return \Tests\Feature\Fixture\Stash\Fields\IdentifyMetadataOptionsField::includeMalePerformers();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\IdentifyMetadataOptionsField<mixed>
     */
    public static function performerGenders(): Fields\IdentifyMetadataOptionsField
    {
        return \Tests\Feature\Fixture\Stash\Fields\IdentifyMetadataOptionsField::performerGenders();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\IdentifyMetadataOptionsField<mixed>
     */
    public static function skipMultipleMatches(): Fields\IdentifyMetadataOptionsField
    {
        return \Tests\Feature\Fixture\Stash\Fields\IdentifyMetadataOptionsField::skipMultipleMatches();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\IdentifyMetadataOptionsField<mixed>
     */
    public static function skipMultipleMatchTag(): Fields\IdentifyMetadataOptionsField
    {
        return \Tests\Feature\Fixture\Stash\Fields\IdentifyMetadataOptionsField::skipMultipleMatchTag();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\IdentifyMetadataOptionsField<mixed>
     */
    public static function skipSingleNamePerformers(): Fields\IdentifyMetadataOptionsField
    {
        return \Tests\Feature\Fixture\Stash\Fields\IdentifyMetadataOptionsField::skipSingleNamePerformers();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\IdentifyMetadataOptionsField<mixed>
     */
    public static function skipSingleNamePerformerTag(): Fields\IdentifyMetadataOptionsField
    {
        return \Tests\Feature\Fixture\Stash\Fields\IdentifyMetadataOptionsField::skipSingleNamePerformerTag();
    }

    /**
     * @param array<\Tests\Feature\Fixture\Stash\IdentifyFieldOptions> $fieldOptions
     * @param array<\Tests\Feature\Fixture\Stash\GenderEnum> $performerGenders
     */
    public static function new(
        ?array $fieldOptions = null,
        ?bool $setCoverImage = null,
        ?bool $setOrganized = null,
        ?bool $includeMalePerformers = null,
        ?array $performerGenders = null,
        ?bool $skipMultipleMatches = null,
        ?string $skipMultipleMatchTag = null,
        ?bool $skipSingleNamePerformers = null,
        ?string $skipSingleNamePerformerTag = null,
    ): self {
        $self = new self();
        $self->fieldOptions = $fieldOptions;
        $self->setCoverImage = $setCoverImage;
        $self->setOrganized = $setOrganized;
        $self->includeMalePerformers = $includeMalePerformers;
        $self->performerGenders = $performerGenders;
        $self->skipMultipleMatches = $skipMultipleMatches;
        $self->skipMultipleMatchTag = $skipMultipleMatchTag;
        $self->skipSingleNamePerformers = $skipSingleNamePerformers;
        $self->skipSingleNamePerformerTag = $skipSingleNamePerformerTag;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('fieldOptions', $data)) {
            $self->fieldOptions = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\IdentifyFieldOptions::fromArray($data);
            }, $data['fieldOptions'] ?? []);
        }
        if (array_key_exists('setCoverImage', $data)) {
            $self->setCoverImage = $data['setCoverImage'];
        }
        if (array_key_exists('setOrganized', $data)) {
            $self->setOrganized = $data['setOrganized'];
        }
        if (array_key_exists('includeMalePerformers', $data)) {
            $self->includeMalePerformers = $data['includeMalePerformers'];
        }
        if (array_key_exists('performerGenders', $data)) {
            $self->performerGenders = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\GenderEnum::from($data);
            }, $data['performerGenders'] ?? []);
        }
        if (array_key_exists('skipMultipleMatches', $data)) {
            $self->skipMultipleMatches = $data['skipMultipleMatches'];
        }
        if (array_key_exists('skipMultipleMatchTag', $data)) {
            $self->skipMultipleMatchTag = $data['skipMultipleMatchTag'];
        }
        if (array_key_exists('skipSingleNamePerformers', $data)) {
            $self->skipSingleNamePerformers = $data['skipSingleNamePerformers'];
        }
        if (array_key_exists('skipSingleNamePerformerTag', $data)) {
            $self->skipSingleNamePerformerTag = $data['skipSingleNamePerformerTag'];
        }

        return $self;
    }
}
