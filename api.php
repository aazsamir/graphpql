<?php

declare(strict_types=1);

use Aazsamir\Graphpql\Client\ConnArgs;
use Aazsamir\Graphpql\Client\GraphqlClient;
use Aazsamir\Graphpql\Client\QueryBuilder;
use Aazsamir\Graphpql\Generated\Fields\FindImagesResultTypeField;
use Aazsamir\Graphpql\Generated\Fields\ImageField;
use Aazsamir\Graphpql\Generated\Fields\ImagePathsTypeField;
use Aazsamir\Graphpql\Generated\Fields\JobField;
use Aazsamir\Graphpql\Generated\Fields\SavedFilterField;
use Aazsamir\Graphpql\Generated\Fields\SavedFindFilterTypeField;
use Aazsamir\Graphpql\Generated\Fields\SortDirectionEnumField;
use Aazsamir\Graphpql\Generated\FindJobInput;
use Aazsamir\Graphpql\Generated\Query\AllImages;
use Aazsamir\Graphpql\Generated\Query\FindImages;
use Aazsamir\Graphpql\Generated\Query\FindJob;
use Aazsamir\Graphpql\Generated\Query\FindSavedFilter;
use Aazsamir\Graphpql\Generated\SelectionSet\FindImagesResultTypeSelectionSet;
use Aazsamir\Graphpql\Generated\SelectionSet\ImageSelectionSet;
use Aazsamir\Graphpql\Generated\SelectionSet\JobSelectionSet;
use Aazsamir\Graphpql\Generated\SelectionSet\SavedFilterSelectionSet;
use GuzzleHttp\Client;

require __DIR__ . '/vendor/autoload.php';

$q = new FindSavedFilter('xd');
$q->select(SavedFilterSelectionSet::new()->select(
    SavedFilterField::id(),
    SavedFilterField::find_filter()->subSelect(fn($x) => $x->select(
        SavedFindFilterTypeField::direction(),
        SavedFindFilterTypeField::sort(),
    )),
));

$q = new FindJob(FindJobInput::new('1'));
$q->select(JobSelectionSet::new()->select(
    JobField::id(),
));

$q = new FindImages()
    ->select(
        FindImagesResultTypeSelectionSet::new()->select(
            FindImagesResultTypeField::images()->subSelect(
                fn($x) => $x->select(
                    ImageField::id(),
                    ImageField::title(),
                    // ImageField::paths()->subSelect(fn ($x) => $x->select(
                    //     ImagePathsTypeField::image()
                    // ))
                )
            )
        )
    );

$queryBuilder = new QueryBuilder();
echo $queryBuilder->fromQuery($q);
echo "\n";

$client = new GraphqlClient(
    new Client(),
    new ConnArgs('http://localhost:9999/graphql'),
    $queryBuilder,
);

$response = $client->query($q);
dd($response);
