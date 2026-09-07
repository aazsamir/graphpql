<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Client;

use Aazsamir\Graphpql\Model\ObjectField;
use Aazsamir\Graphpql\Model\Query;
use Aazsamir\Graphpql\Model\SelectionSet;

class QueryBuilder
{
    public function fromQuery(Query $query): string
    {        
        $string = <<<GRAPHQL
        query {
            {$query::getName()}%s
        }
        GRAPHQL;

        $string = sprintf($string, $this->parseSelectionSet($query->getSelectionSet(), 2));

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