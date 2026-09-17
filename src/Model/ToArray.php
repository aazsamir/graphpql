<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Model;

trait ToArray
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return $this->serializeArray(get_object_vars($this));
    }

    private function serializeArray(array $data): array
    {
        $array = [];

        foreach ($data as $name => $value) {
            $array[$name] = $this->serializeValue($value);
        }

        return $array;
    }

    private function serializeValue(mixed $value): mixed
    {
        if (\is_object($value) && method_exists($value, 'toArray')) {
            return $value->toArray();
        }
        if ($value instanceof \BackedEnum) {
            return $value->value;
        }
        if ($value instanceof \UnitEnum) {
            return $value->name;
        }
        if (\is_array($value) && $value !== []) {
            return array_map($this->serializeValue(...), $value);
        }
        if ($value instanceof \DateTimeInterface) {
            return $value->format(\DateTimeInterface::ATOM);
        }
        if (\is_object($value)) {
            return $this->serializeArray(get_object_vars($value));
        }

        return $value;
    }
}
