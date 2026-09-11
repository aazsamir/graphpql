<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Client;

use Aazsamir\Graphpql\Generator\Pad;
use Aazsamir\Graphpql\Model\Mutation;
use Aazsamir\Graphpql\Model\NullSelectionSet;
use Aazsamir\Graphpql\Model\Operation;
use Aazsamir\Graphpql\Model\Query;
use Aazsamir\Graphpql\Model\SelectionSet;

class QueryBuilder
{
    public function fromOperation(Operation $operation): string
    {
        $name = match (true) {
            $operation instanceof Query => 'query',
            $operation instanceof Mutation => 'mutation',
        };
        $string = <<<GRAPHQL
        $name {
            {$operation::getName()}%s
        GRAPHQL;
        $string = \str_replace("\r\n", "\n", $string);

        $indent = 2;

        if ($operation->getVars()) {
            $string = sprintf($string, $this->parseVars($operation->getVars(), $indent)) . '%s';
        }

        $string = sprintf($string, $this->parseSelectionSet($operation->getSelectionSet(), $indent));
        $string .= "\n}";

        return $string;        
    }

    private function parseVars(array $vars, int $indent = 0): string|int|float
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
            $string .= Pad::pad("$name: $strValue", $indent) . "\n";
        }

        if ($string !== null) {
            $string .= Pad::pad(")", $indent - 1);
        }

        return (string) $string;
    }

    private function parseVarValue(mixed $value, int $indent): string|int|float
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
            if ($value === null) {
                continue;
            }

            $strValue = $this->parseVarValue($value, $indent);
            $string .= Pad::pad("$name: $strValue", $indent) . "\n";
        }

        $string .= Pad::pad("}", $indent - 1);

        return $string;        
    }

    private function parseVarArray(array $array, int $indent): string
    {
        $string = "[";
        foreach ($array as $value) {
            if ($value === null) {
                continue;
            }

            $string .= $this->parseVarValue($value, $indent);
            $string .= ',';
        }

        $string = rtrim($string, ',');
        $string .= ']';

        return $string;
    }

    private function parseSelectionSet(SelectionSet $set, int $indent = 0, ?string $preset = null): string
    {
        if ($set instanceof NullSelectionSet) {
            return '';
        }

        $string = " {\n";

        if ($preset) {
            $string .= $preset;
            $string .= "\n";
        }

        foreach ($set->getSelection() as $field) {
            if ($field->getUnion()) {
                $string .= Pad::pad("... on {$field->getUnion()} ", $indent);
                $string .= $this->parseSelectionSet($field->getChild(), $indent + 1, Pad::pad('__typename', $indent + 1));
                $string .= "\n";

                continue;
            }

            $string .= Pad::pad($field->getName(), $indent);

            if ($field->getChild()) {
                $string .= $this->parseSelectionSet($field->getChild(), $indent + 1);
            }

            $string .= "\n";
        }

        $string .= Pad::pad("}", $indent - 1);

        return $string;
    }
}