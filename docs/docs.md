# graphpql docs

## 1. Quick Start

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

## 2. Building queries

Each query, mutation and field types have `selector` method. It accepts a callback, with selection set as an argument.

You are expected to call `select` method on this argument, for building queries.

```php
$api->allImages()
    ->selector(fn ($x) => $x->select(
        ImageField::id(),
    ));
```
```graphql
query {
    allImages {
        id
    }
}
```

`select` method accepts only correct field type class arguments, that you can obtain by calling static method on field type (suffixed with `Field` in `Field` namespace).
```php
ImageField::id()
```

or directly from resulting type for convenience
```php
Image::id()
```

### Nesting

For nesting, you repeat `selector` and `select` chain.
```php
$api->allImages()
    ->selector(fn ($x) => $x->select(
        Image::files()->selector(fn ($x) => $x->select(
            ImageFile::id(),
        ))
    ));
```
```graphql
query {
    allImages {
        files {
            id
        }
    }
}
```

### Unions

If you need to handle unions, use `onFieldName` methods.
```php
$api->allImages()
    ->selector(fn ($x) => $x->select(
        Image::visual_files()->selector(fn ($x) => $x->select(
            VisualFileField::onImageFile()->selector(fn ($x) => $x->select(
                ImageFile::id(),
            )),
            VisualFileField::onVideoFile()->selector(fn ($x) => $x->select(
                VideoFileField::id(),
            )),
        ))
    ));
```
```graphql
query {
    allImages {
        visual_files {
            ... on ImageFile  {
                __typename
                id
            }
            ... on VideoFile  {
                __typename
                id
            }
        }
    }
}
```
> **NOTE**: `__typename` is added automatically for unions, for correct type deserialization

### Fragments

Fragments are not supported yet :(

## Query Input

Query input arguments are passed directly as query function arguments.
```php
$query = $api->findImage(id: "1")
    ->selector(fn ($x) => $x->select(
        Image::id()
    ));
```
```graphql
query {
    findImage(
        id: "1"
    ) {
        id
    }
}
```