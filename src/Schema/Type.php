<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Schema;

readonly class Type
{
    /**
     * @param Field[]|null $fields
     * @param InputField[]|null $inputFields
     * @param EnumValue[]|null $enumValues
     */
    public function __construct(
        public ?string $name,
        public TypeKind $kind,
        public ?string $description = null,
        public ?array $fields = null,
        public ?array $inputFields = null,
        public ?array $interfaces = null,
        public ?array $enumValues = null,
        public ?array $possibleTypes = null,
        public ?Type $ofType = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'] ?? null,
            kind: TypeKind::from($data['kind']),
            description: $data['description'] ?? null,
            fields: $data['fields'] ?? null,
            inputFields: $data['inputFields'] ?? null,
            interfaces: $data['interfaces'] ?? null,
            enumValues: $data['enumValues'] ?? null,
            possibleTypes: $data['possibleTypes'] ?? null,
            ofType: isset($data['ofType']) ? self::fromArray($data['ofType']) : null,
        );
    }

    public function primary(): self
    {
        return $this->ofType?->primary() ?? $this;
    }
}
