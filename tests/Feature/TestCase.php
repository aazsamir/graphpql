<?php

declare(strict_types=1);

namespace Tests\Feature;

use Aazsamir\Graphpql\Client\ConnArgs;
use Aazsamir\Graphpql\Client\SchemaClient;
use Aazsamir\Graphpql\GraphqlGenerator;
use PHPUnit\Framework\TestCase as FrameworkTestCase;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Tests\Mock\FakePsrClient;
use Tests\Mock\MemoryFileAccess;

abstract class TestCase extends FrameworkTestCase
{
    private GraphqlGenerator $graphqlGenerator;
    private MemoryFileAccess $fileAccess;
    private FakePsrClient $psrClient;
    private SchemaClient $schemaClient;

    protected function setUp(): void
    {
        parent::setUp();

        $this->fileAccess = new MemoryFileAccess();
        $this->graphqlGenerator = new GraphqlGenerator($this->fileAccess);
        $this->psrClient = new FakePsrClient();
        $this->schemaClient = new SchemaClient($this->psrClient);
    }

    protected function testProjectGeneration(
        string $project,
        string $namespace,
    ): void {
        $dir = __DIR__ . '/Fixture/' . $project;
        $schemaDir = $dir . '/schema.json';
        $schema = \file_get_contents($schemaDir);
        $this->psrClient->response = \json_decode($schema, true);
        $schema = $this->schemaClient->fetchSchema(new ConnArgs('http://127.0.0.1/graphql'));

        $this->graphqlGenerator->generate($schema, $namespace, $dir);

        foreach ($this->findFiles($dir) as $file) {
            $realContent = \file_get_contents($file);
            $generatedContent = $this->fileAccess->files[$file];
            $this->assertEquals($realContent, $generatedContent);
        }
    }

    private function findFiles(string $directory): array
    {
        $files = [];

        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($directory)
        );

        foreach ($iterator as $file) {
            if ($file->isFile() && $file->getExtension() === 'php') {
                $files[] = $file->getPathname();
            }
        }

        return $files;
    }
}
