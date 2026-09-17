<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql;

use Aazsamir\Graphpql\Generator\FieldSetGenerator;
use Aazsamir\Graphpql\Generator\FileAccess;
use Aazsamir\Graphpql\Generator\NameResolver;
use Aazsamir\Graphpql\Generator\Namespaced;
use Aazsamir\Graphpql\Generator\OperationGenerator;
use Aazsamir\Graphpql\Generator\SelectionSetGenerator;
use Aazsamir\Graphpql\Generator\SystemFileAccess;
use Aazsamir\Graphpql\Generator\TypeGenerator;
use Aazsamir\Graphpql\Generator\TypeSkip;
use Aazsamir\Graphpql\Model\Mutation;
use Aazsamir\Graphpql\Model\Query;
use Aazsamir\Graphpql\Schema\Schema;

class GraphqlGenerator
{
    use TypeSkip;

    public function __construct(
        private FileAccess $fileAccess,
    ) {}

    public static function default(): self
    {
        return new self(new SystemFileAccess());
    }

    public function generate(
        Schema $schema,
        string $namespace,
        string $outputDir,
    ): void {
        $namespace = new Namespaced($namespace);
        $nameResolver = new NameResolver($schema);
        $fieldSetGenerator = new FieldSetGenerator(
            $schema,
            $nameResolver,
            $this->fileAccess,
        );
        $selectionSetGenerator = new SelectionSetGenerator(
            $nameResolver,
            $this->fileAccess,
            $fieldSetGenerator,
        );
        $fieldSetGenerator->setSelectionSetGenerator($selectionSetGenerator);
        $typeGenerator = new TypeGenerator(
            $schema,
            $nameResolver,
            $this->fileAccess,
            $selectionSetGenerator,
        );
        $operationGenerator = new OperationGenerator(
            $schema,
            $nameResolver,
            $this->fileAccess,
            $selectionSetGenerator,
        );

        $this->fileAccess->ensureClearDir($outputDir);

        foreach ($schema->types as $type) {
            $typeGenerator->generateType($type, $namespace, $outputDir);
        }

        foreach ($schema->queries as $query) {
            $operationGenerator->generateOperation($query, $namespace, $outputDir, Query::class, 'Query');
        }

        foreach ($schema->mutations as $mutation) {
            $operationGenerator->generateOperation($mutation, $namespace, $outputDir, Mutation::class, 'Mutation');
        }

        $operationGenerator->generateApi($namespace, $outputDir);
    }
}
