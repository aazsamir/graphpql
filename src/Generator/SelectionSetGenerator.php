<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Generator;

use Aazsamir\Graphpql\Model\NullSelectionSet;
use Aazsamir\Graphpql\Model\SelectionSet;
use Aazsamir\Graphpql\Schema\Schema;
use Aazsamir\Graphpql\Schema\Type;
use Nette\PhpGenerator\ClassType;

class SelectionSetGenerator
{
    use TypeSkip;

    public function __construct(
        private Schema $schema,
        private NameResolver $nameResolver,
        private FileAccess $fileAccess,
        private FieldSetGenerator $fieldSetGenerator,
    ) {}

    public function generateSelectionSet(Type $type, Namespaced $namespace, string $outputDir): string
    {
        [$_, $classname, $_] = $this->nameResolver->className($type->primary(), $namespace, true);

        if ($this->isPrimitive($classname)) {
            return '\\' . NullSelectionSet::class;
        }

        if ($classname === 'mixed') {
            return '\\' . NullSelectionSet::class;
        }

        $classname .= 'SelectionSet';
        $fullname = $namespace->add('SelectionSet')->add($classname)->toString();

        if (\in_array($fullname, $this->skip)) {
            return $fullname;
        }

        $this->skip[] = $fullname;

        $class = new ClassType($classname);
        $class->addImplement(SelectionSet::class);

        $this->addSelectionSetNewMethod($class);
        $this->addSelectionSetSelection($type, $namespace, $class, $outputDir);

        $this->fileAccess->saveFile($classname, $namespace->add('SelectionSet'), $outputDir . '/SelectionSet', $class);

        return $fullname;
    }

    private function addSelectionSetNewMethod(ClassType $class): void
    {
        // add new
        $class->addMethod('new')
            ->setStatic()
            ->setPublic()
            ->setReturnType('self')
            ->addBody('return new self();');
    }

    private function addSelectionSetSelection(Type $type, Namespaced $namespace, ClassType $class, string $outputDir): void
    {
        $class->addProperty('selection', [])->setType('array')->setPrivate();
        $fieldSetType = $this->fieldSetGenerator->generateFieldSet($type, $namespace, $outputDir);

        $method = $class->addMethod('select')
            ->setPublic()
            ->setReturnType('self');

        $method
            ->setVariadic()
            ->addParameter('selection')
            ->setType($fieldSetType);

        $body = <<<PHP
        \$this->selection = \$selection;

        return \$this;
        PHP;
        $method->addBody($body);

        // add getSelection
        $class->addMethod('getSelection')
            ->setPublic()
            ->setReturnType('array')
            ->addBody('return $this->selection;')
            ->addComment('@return ' . $fieldSetType . '[]');
    }
}
