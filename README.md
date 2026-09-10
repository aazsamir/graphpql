# graphpql

Graphpql is a library for code generation of types, queries and mutations based on graphql schema.

## Usage

Install `graphpql` with composer.

```
composer require aazsamir/graphpql
```

Create a script for code generation.

```php
<?php
// graphql-generate.php
use Aazsamir\Graphpql\Client\ConnArgs;
use Aazsamir\Graphpql\Client\SchemaClient;
use Aazsamir\Graphpql\GraphqlGenerator;
use GuzzleHttp\Client;

require __DIR__ . '/vendor/autoload.php';

$client = new SchemaClient(new Client());
$schema = $client->fetchSchema(new ConnArgs(
    endpoint: 'http://localhost:9999/graphql',
));

$generator = GraphqlGenerator::default();
$generator->generate(
    $schema,
    '\\App\\Generated',
    __DIR__ . '/src/Generated',
);
```

Run it
```
php graphql-generate.php
```

And use generated API
```php
<?php
use Aazsamir\Graphpql\Client\ConnArgs;
use Aazsamir\Graphpql\Client\GraphqlClient;
use App\Generated\Api;
use App\Generated\FindImagesResultType;
use App\Generated\Image;
use App\Generated\ImagePathsType;
use GuzzleHttp\Client;

$client = new GraphqlClient(
    new Client(),
    new ConnArgs('http://localhost:9999/graphql'),
    new QueryBuilder(),
);

$api = new Api($client);

$query = $api->findImages(ids: ['1', '2'])
    ->selector(
        fn ($x) => $x->select(
            FindImagesResultType::images()->selector(
                fn($x) => $x->select(
                    Image::id(),
                    Image::title(),
                    Image::paths()->selector(fn ($x) => $x->select(
                        ImagePathsType::image(),
                    ))
                )
            )
        )
    );

dd($query->do());
```

You can inspect resulting query string using `dd` method.

```php
$query->dd();
/* will output:
query {
    findImages(
        ids: ["1","2"]
    ) {
        images {
            id
            title
            paths {
                image
            }
        }
    }
}
*/
```

## Docs

Checkout docs at [docs/docs.md](./docs/docs.md) for more information.

## License

This project is licensed under MIT License.