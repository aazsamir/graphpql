<?php

declare(strict_types=1);

use Aazsamir\Graphpql\Client\ConnArgs;
use Aazsamir\Graphpql\Client\SchemaClient;
use Aazsamir\Graphpql\Generator;
use GuzzleHttp\Client;

require __DIR__ . '/vendor/autoload.php';

$client = new SchemaClient(
    new Client(),
);

$schema = $client->fetchSchema(
    new ConnArgs(
        endpoint: 'http://localhost:9999/graphql',
    ),
);

// foreach ($schema->types as $type) {
//     dump($type);
// }

$generator = new Generator();
$generator->generate(
    $schema,
    '\\Aazsamir\\Graphpql\\Generated',
    __DIR__ . '/src/Generated',
);
