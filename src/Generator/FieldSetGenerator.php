<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Generator;

use Aazsamir\Graphpql\Model\NullField;
use Aazsamir\Graphpql\Model\ObjectField;
use Aazsamir\Graphpql\Model\SelectionSet;
use Aazsamir\Graphpql\Schema\Field;
use Aazsamir\Graphpql\Schema\Schema;
use Aazsamir\Graphpql\Schema\Type;
use Aazsamir\Graphpql\Schema\TypeKind;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PropertyAccessMode;

class FieldSetGenerator
{
    use TypeSkip;

    private SelectionSetGenerator $selectionSetGenerator;

    public function __construct(
        private Schema $schema,
        private NameResolver $nameResolver,
        private FileAccess $fileAccess,
    ) {}

    public function setSelectionSetGenerator(SelectionSetGenerator $selectionSetGenerator): void
    {
        $this->selectionSetGenerator = $selectionSetGenerator;
    }

    public function generateFieldSet(Type $type, Namespaced $namespace, string $outputDir): string
    {
        [$_, $classname, $_] = $this->nameResolver->className($type, $namespace, true);

        if ($classname === 'mixed') {
            throw new \Exception('Unreachable');
        }

        if ($this->isPrimitive($classname)) {
            return '\\' . NullField::class;
        }

        $classname .= 'Field';
        $fullname = $namespace->add('Fields')->add($classname)->toString();

        if (\in_array($fullname, $this->skip, true)) {
            return $fullname;
        }

        $this->skip[] = $fullname;

        $class = new ClassType($classname);
        $class->addImplement(ObjectField::class);
        $comment = '@template T';
        $class->addComment($comment);

        $class->addProperty('fieldVars', [])->setType('array')->setPrivate(PropertyAccessMode::Set);
        $class->addProperty('name')->setType('string')->setPrivate();
        $class->addProperty('child')->setType(SelectionSet::class)->setPrivate();
        $class->addProperty('union')->setType('?string')->setPrivate()->setValue(null);

        foreach ($type->fields as $field) {
            $this->addFieldMethod($class, $field, $namespace, $outputDir);
        }

        $this->addUnionHandles($class, $type, $namespace);
        $this->addSelectorMethod($class);
        $this->addGetNameMethod($class);
        $this->addGetChildMethod($class);
        $this->addGetUnionMethod($class);

        $this->fileAccess->saveFile(
            $classname,
            $namespace->add('Fields'),
            $outputDir . '/Fields',
            $class,
        );

        return $fullname;
    }

    private function addUnionHandles(ClassType $class, Type $type, Namespaced $namespace): void
    {
        if ($type->primary()->kind->isAny(TypeKind::UNION, TypeKind::INTERFACE) === false) {
            return;
        }

        foreach ($this->schema->findType($type->primary()->name)->possibleTypes ?? [] as $possibleType) {
            [$_, $possibleTypeClassname, $_] = $this->nameResolver->classNameWithNamespace($possibleType, $namespace->add('SelectionSet'));
            $possibleTypeClassname .= 'SelectionSet';
            $method = $class->addMethod('on' . $possibleType->name)
                ->setReturnType('self')
                ->setStatic();

            $body = <<<PHP
            \$instance = new self();
            \$instance->child = new {$possibleTypeClassname}();
            \$instance->union = '{$possibleType->name}';

            return \$instance;
            PHP;
            $method->setBody($body);
            $method->addComment("@return self<$possibleTypeClassname>");
        }
    }

    private function addFieldMethod(ClassType $class, Field $field, Namespaced $namespace, string $outputDir): void
    {
        $docblock = '@return self<mixed>';

        $method = $class->addMethod($field->name)
            ->setStatic()
            ->setReturnType('self');

        if ($field->type->primary()->kind->isAny(TypeKind::INPUT_OBJECT, TypeKind::OBJECT, TypeKind::UNION, TypeKind::INTERFACE)) {
            $childSelection = $this->selectionSetGenerator->generateSelectionSet(
                $this->schema->findType($field->type->primary()->name),
                $namespace,
                $outputDir,
            );

            if ($childSelection === 'mixed') {
                throw new \Exception('Unreachable');
            }

            $body = <<<PHP
            \$instance = new self();
            \$instance->name = '$field->name';
            \$instance->child = new {$childSelection}();

            PHP;

            $docblock = "@return self<$childSelection>";
        } else {
            $body = <<<PHP
            \$instance = new self();
            \$instance->name = '$field->name';

            PHP;
        }

        foreach ($field->args ?? [] as $arg) {
            [$argNullable, $argClassname, $argDocblock] = $this->nameResolver->classNameWithNamespace($arg->type, $namespace);
            $method->addParameter($arg->name)
                ->setType($argClassname)
                ->setNullable($argNullable);

            if ($argDocblock) {
                $method->addComment('@param ' . $argDocblock . ' $' . $arg->name);
            }

            $body .= "\$instance->fieldVars['{$arg->name}'] = \${$arg->name};\n";
        }

        $body .= "\n";
        $body .= 'return $instance;';

        $method->addBody($body);

        if ($field->isDeprecated) {
            $method->addComment('@deprecated ' . $field->deprecationReason);
        }

        if ($docblock) {
            $method->addComment($docblock);
        }
    }

    private function addSelectorMethod(ClassType $class): void
    {
        // add selector()
        $method = $class->addMethod('selector');
        $method
            ->setPublic()
            ->setReturnType('self');
        $method->addParameter('selection')->setType('callable');
        $method->addComment('@param callable(T): void $selection');
        $body = <<<'PHP'
        $selection($this->child);

        return $this;
        PHP;
        $method->addBody($body);
    }

    private function addGetNameMethod(ClassType $class): void
    {
        // add getName
        $class->addMethod('getName')
            ->setPublic()
            ->setReturnType('string')
            ->addBody('return $this->name;');
    }

    private function addGetChildMethod(ClassType $class): void
    {
        $body = <<<'PHP'
        if (isset($this->child)) {
            return $this->child;
        }

        return null;
        PHP;

        // add getChild
        $class->addMethod('getChild')
            ->setPublic()
            ->setReturnType('?' . SelectionSet::class)
            ->addBody($body);
    }

    private function addGetUnionMethod(ClassType $class): void
    {
        // add getUnion
        $class->addMethod('getUnion')
            ->setPublic()
            ->setReturnType('?string')
            ->setBody('return $this->union;');
    }
}
