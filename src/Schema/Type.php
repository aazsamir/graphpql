<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Schema;

readonly class Type
{
    /**
     * @param Field[] $fields
     * @param InputField[] $inputFields
     * @param EnumValue[] $enumValues
     * @param Type[] $possibleTypes
     */
    public function __construct(
        public ?string $name,
        public TypeKind $kind,
        public ?string $description = null,
        public array $fields = [],
        public array $inputFields = [],
        public array $interfaces = [],
        public array $enumValues = [],
        public array $possibleTypes = [],
        public ?Type $ofType = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'] ?? null,
            kind: TypeKind::from($data['kind']),
            description: $data['description'] ?? null,
            fields: $data['fields'] ?? [],
            inputFields: $data['inputFields'] ?? [],
            interfaces: $data['interfaces'] ?? [],
            enumValues: $data['enumValues'] ?? [],
            possibleTypes: $data['possibleTypes'] ?? [],
            ofType: isset($data['ofType']) ? self::fromArray($data['ofType']) : null,
        );
    }

    public function primary(): self
    {
        return $this->ofType?->primary() ?? $this;
    }

    public function isArray(): bool
    {
        return $this->kind === TypeKind::LIST
            || (
                $this->kind === TypeKind::NON_NULL && $this->ofType->kind === TypeKind::LIST
            );
    }
}
