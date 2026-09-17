<?php

declare(strict_types=1);

namespace Tests\Feature;

use Aazsamir\Graphpql\Client\ConnArgs;
use Aazsamir\Graphpql\Client\SchemaClient;
use Aazsamir\Graphpql\GraphqlGenerator;
use GuzzleHttp\Client;

class GenerateTestCase
{
    private SchemaClient $schemaClient;

    public function __construct(
        private ConnArgs $connArgs,
        private string $namespace,
        private string $outputDir,
    ) {
        $this->schemaClient = new SchemaClient(new Client());
    }

    public function generate(): void
    {
        $this->ensureDir();
        $schema = $this->schemaClient->fetchSchema($this->connArgs);
        $graphqlGenerator = GraphqlGenerator::default();
        $graphqlGenerator->generate(
            $schema,
            $this->namespace,
            $this->outputDir,
        );

        $this->saveSchemaFixture();
    }

    private function ensureDir(): void
    {
        if (!is_dir($this->outputDir)) {
            mkdir($this->outputDir, recursive: true);
        }
    }

    private function saveSchemaFixture(): void
    {
        $schema = $this->schemaClient->fetchRawSchema($this->connArgs);
        $schemaDir = $this->outputDir . '/schema.json';
        \file_put_contents($schemaDir, \json_encode($schema, \JSON_PRETTY_PRINT));
    }
}
