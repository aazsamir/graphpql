<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class Package implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public string $package_id;
    public string $name;
    public ?string $version;
    public ?\DateTimeInterface $date;

    /** @var array<\Tests\Feature\Fixture\Stash\Package> */
    public array $requires;
    public string $sourceURL;
    public ?Package $source_package;
    public mixed $metadata;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PackageField<mixed>
     */
    public static function package_id(): Fields\PackageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PackageField::package_id();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PackageField<mixed>
     */
    public static function name(): Fields\PackageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PackageField::name();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PackageField<mixed>
     */
    public static function version(): Fields\PackageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PackageField::version();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PackageField<mixed>
     */
    public static function date(): Fields\PackageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PackageField::date();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PackageField<\Tests\Feature\Fixture\Stash\SelectionSet\PackageSelectionSet>
     */
    public static function requires(): Fields\PackageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PackageField::requires();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PackageField<mixed>
     */
    public static function sourceURL(): Fields\PackageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PackageField::sourceURL();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PackageField<\Tests\Feature\Fixture\Stash\SelectionSet\PackageSelectionSet>
     */
    public static function source_package(): Fields\PackageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PackageField::source_package();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\PackageField<mixed>
     */
    public static function metadata(): Fields\PackageField
    {
        return \Tests\Feature\Fixture\Stash\Fields\PackageField::metadata();
    }

    /**
     * @param array<\Tests\Feature\Fixture\Stash\Package> $requires
     */
    public static function new(
        string $package_id,
        string $name,
        array $requires,
        string $sourceURL,
        mixed $metadata,
        ?string $version = null,
        ?\DateTimeInterface $date = null,
        ?Package $source_package = null,
    ): self {
        $self = new self();
        $self->package_id = $package_id;
        $self->name = $name;
        $self->requires = $requires;
        $self->sourceURL = $sourceURL;
        $self->metadata = $metadata;
        $self->version = $version;
        $self->date = $date;
        $self->source_package = $source_package;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('package_id', $data)) {
            $self->package_id = $data['package_id'];
        }
        if (array_key_exists('name', $data)) {
            $self->name = $data['name'];
        }
        if (array_key_exists('requires', $data)) {
            $self->requires = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\Package::fromArray($data);
            }, $data['requires'] ?? []);
        }
        if (array_key_exists('sourceURL', $data)) {
            $self->sourceURL = $data['sourceURL'];
        }
        if (array_key_exists('metadata', $data)) {
            $self->metadata = $data['metadata'];
        }
        if (array_key_exists('version', $data)) {
            $self->version = $data['version'];
        }
        if (array_key_exists('date', $data)) {
            $self->date = new \DateTimeImmutable($data['date']);
        }
        if (array_key_exists('source_package', $data)) {
            $self->source_package = \Tests\Feature\Fixture\Stash\Package::fromArray($data['source_package']);
        }

        return $self;
    }
}
