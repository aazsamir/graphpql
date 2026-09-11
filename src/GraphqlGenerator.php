<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql;

use Aazsamir\Graphpql\Client\GraphqlClient;
use Aazsamir\Graphpql\Client\QueryBuilder;
use Aazsamir\Graphpql\Generator\FieldSetGenerator;
use Aazsamir\Graphpql\Generator\FileAccess;
use Aazsamir\Graphpql\Generator\NameResolver;
use Aazsamir\Graphpql\Generator\Namespaced;
use Aazsamir\Graphpql\Generator\OperationGenerator;
use Aazsamir\Graphpql\Generator\Pad;
use Aazsamir\Graphpql\Generator\SelectionSetGenerator;
use Aazsamir\Graphpql\Generator\TypeGenerator;
use Aazsamir\Graphpql\Generator\TypeSkip;
use Aazsamir\Graphpql\Model\GraphEnum;
use Aazsamir\Graphpql\Model\GraphObject;
use Aazsamir\Graphpql\Model\Mutation;
use Aazsamir\Graphpql\Model\NullField;
use Aazsamir\Graphpql\Model\NullSelectionSet;
use Aazsamir\Graphpql\Model\ObjectField;
use Aazsamir\Graphpql\Model\Query;
use Aazsamir\Graphpql\Model\SelectionSet;
use Aazsamir\Graphpql\Schema\Field;
use Aazsamir\Graphpql\Schema\Schema;
use Aazsamir\Graphpql\Schema\Type;
use Aazsamir\Graphpql\Schema\TypeKind;
use Nette\PhpGenerator\ClassLike;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\EnumType;
use Nette\PhpGenerator\Method;

class GraphqlGenerator
{
    use TypeSkip;

    private array $skip = [];

    public function __construct(
        private FileAccess $fileAccess,
    ) {}

    public static function default(): self
    {
        return new self(new FileAccess);
    }

    public function generate(
        Schema $schema,
        string $namespace,
        string $outputDir
    ): void {
        $namespace = new Namespaced($namespace);
        $nameResolver = new NameResolver($schema);
        $fieldSetGenerator = new FieldSetGenerator(
            $schema,
            $nameResolver,
            $this->fileAccess,
        );
        $selectionSetGenerator = new SelectionSetGenerator(
            $schema,
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
