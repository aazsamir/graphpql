<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Client;

use Aazsamir\Graphpql\Model\Query;
use Aazsamir\Graphpql\Model\SelectionSet;

class QueryBuilder
{
    public function fromQuery(Query $query): string
    {        
        $string = <<<GRAPHQL
        query {
            {$query::getName()}%s
        GRAPHQL;
        $string = \str_replace("\r\n", "\n", $string);

        $indent = 2;

        if ($query->getVars()) {
            $string = sprintf($string, $this->parseVars($query->getVars(), $indent)) . '%s';
        }

        $string = sprintf($string, $this->parseSelectionSet($query->getSelectionSet(), $indent));
        $string .= "\n}";

        return $string;
    }

    private function parseVars(array $vars, int $indent = 0): string
    {
        $string = null;

        foreach ($vars as $name => $value) {
            if ($value === null) {
                continue;
            }

            if ($string === null) {
                $string = "(\n";
            }

            $strValue = $this->parseVarValue($value, $indent);
            $string .= $this->pad("$name: $strValue", $indent) . "\n";
        }

        if ($string !== null) {
            $string .= $this->pad(")", $indent - 1);
        }

        return (string) $string;
    }

    private function parseVarValue(mixed $value, int $indent): string
    {
        return match (true) {
            is_string($value) => '"' . $value . '"',
            is_numeric($value) => $value,
            $value instanceof \DateTimeInterface => '"' . $value->format('Y-m-d H:i:s') . '"',
            $value instanceof \UnitEnum => $value->name,
            $value instanceof \BackedEnum => $value->value,
            is_object($value) => $this->parseVarObject($value, $indent + 1),
            is_array($value) => $this->parseVarArray($value, $indent + 1),
            default => throw new \Exception('Dont know how to handle ' . \get_debug_type($value)),
        };
    }

    private function parseVarObject(object $object, int $indent): string
    {
        $vars = \get_object_vars($object);
        $string = "{\n";

        foreach ($vars as $name => $value) {
            $strValue = $this->parseVarValue($value, $indent);
            $string .= $this->pad("$name: $strValue", $indent) . "\n";
        }

        $string .= $this->pad("}", $indent - 1);

        return $string;        
    }

    private function parseVarArray(array $array, int $indent): string
    {
        $string = "[";
        foreach ($array as $value) {
            $string .= $this->parseVarValue($value, $indent);
            $string .= ',';
        }

        $string = rtrim($string, ',');
        $string .= ']';

        return $string;
    }

    private function parseSelectionSet(SelectionSet $set, int $indent = 0): string
    {
        $string = " {\n";

        foreach ($set->getSelection() as $field) {
            $string .= $this->pad($field->getName(), $indent);

            if ($field->getChild()) {
                $string .= $this->parseSelectionSet($field->getChild(), $indent + 1);
            }

            $string .= "\n";
        }

        $string .= $this->pad("}", $indent - 1);

        return $string;
    }

    private function pad(string $string, int $indent): string
    {
        return \str_repeat(' ', $indent * 4) . $string;
    }
}