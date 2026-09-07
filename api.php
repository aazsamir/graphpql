<?php

declare(strict_types=1);

use Aazsamir\Graphpql\Client\QueryBuilder;
use Aazsamir\Graphpql\Generated\Fields\SavedFilterField;
use Aazsamir\Graphpql\Generated\Fields\SavedFindFilterTypeField;
use Aazsamir\Graphpql\Generated\Fields\SortDirectionEnumField;
use Aazsamir\Graphpql\Generated\Query\FindSavedFilter;
use Aazsamir\Graphpql\Generated\SelectionSet\SavedFilterSelectionSet;

require __DIR__ . '/vendor/autoload.php';

$q = new FindSavedFilter();
$q->select(SavedFilterSelectionSet::new()->select(
    SavedFilterField::id(),
    SavedFilterField::find_filter()->subSelect(fn ($x) => $x->select(
        SavedFindFilterTypeField::direction(),
        SavedFindFilterTypeField::sort(),
    )),
));

$queryBuilder = new QueryBuilder();
dd($queryBuilder->fromQuery($q));