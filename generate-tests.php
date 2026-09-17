<?php

declare(strict_types=1);

use Aazsamir\Graphpql\Client\ConnArgs;
use Tests\Feature\GenerateTestCase;

require __DIR__ . '/vendor/autoload.php';

new GenerateTestCase(
    new ConnArgs('http://127.0.0.1:9999/graphql'),
    '\\Tests\\Feature\\Fixture\\Stash',
    __DIR__ . '/tests/Feature/Fixture/Stash',
)->generate();

new GenerateTestCase(
    new ConnArgs('https://countries.trevorblades.com/graphql'),
    '\\Tests\\Feature\\Fixture\\Countries',
    __DIR__ . '/tests/Feature/Fixture/Countries',
)->generate();