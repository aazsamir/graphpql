<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Generator;

use Aazsamir\Graphpql\Model\NullField;
use Aazsamir\Graphpql\Model\ObjectField;
use Aazsamir\Graphpql\Model\SelectionSet;
use Aazsamir\Graphpql\Schema\Schema;
use Aazsamir\Graphpql\Schema\Type;
use Aazsamir\Graphpql\Schema\TypeKind;
use Nette\PhpGenerator\ClassType;

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
        [$_, $classname, $_] = $this->nameResolver->safeClassName($type, $namespace, true);

        if ($classname === 'mixed') {
            throw new \Exception('Unreachable');
        }

        if ($this->isPrimitive($classname)) {
            return '\\' . NullField::class;
        }

        $classname .= 'Field';
        $fullname = $namespace->add('Fields')->add($classname)->toString();

        if (in_array($fullname, $this->skip)) {
            return $fullname;
        }

        $this->skip[] = $fullname;

        $class = new ClassType($classname);
        $class->addImplement(ObjectField::class);
        $comment = '@template T';
        $class->addComment($comment);

        $class->addProperty('name')->setType('string')->setPrivate();
        $class->addProperty('child')->setType(SelectionSet::class)->setPrivate();
        $class->addProperty('union')->setType('?string')->setPrivate()->setValue(null);

        foreach ($type->fields as $field) {
            $docblock = '@return self<mixed>';

            if ($field->type->primary()->kind->isAny(TypeKind::INPUT_OBJECT, TypeKind::OBJECT, TypeKind::UNION)) {
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

                return \$instance;
                PHP;

                $docblock = "@return self<$childSelection>";
            } else {
                $body = <<<PHP
                \$instance = new self();
                \$instance->name = '$field->name';

                return \$instance;
                PHP;
            }

            $method = $class->addMethod($field->name)
                ->setStatic()
                ->setReturnType('self')
                ->addBody($body);

            if ($docblock) {
                $method->addComment($docblock);
            }
        }

        if ($type->primary()->kind->isAny(TypeKind::UNION)) {
            foreach ($this->schema->findType($type->primary()->name)->possibleTypes ?? [] as $possibleType) {
                [$_, $possibleTypeClassname, $_] = $this->nameResolver->safeClassNameWithNamespace($possibleType, $namespace->add('SelectionSet'));
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

        // add selector()
        $method = $class->addMethod('selector');
        $method
            ->setPublic()
            ->setReturnType('self');
        $method->addParameter('selection')->setType('callable');
        $method->addComment('@param callable(T): void $selection');
        $body = <<<PHP
        \$selection(\$this->child);

        return \$this;
        PHP;
        $method->addBody($body);

        // add getName
        $method = $class->addMethod('getName')
            ->setPublic()
            ->setReturnType('string')
            ->addBody('return $this->name;');

        $body = <<<'PHP'
        if (isset($this->child)) {
            return $this->child;
        }

        return null;
        PHP;

        // add getChild
        $method = $class->addMethod('getChild')
            ->setPublic()
            ->setReturnType('?' . SelectionSet::class)
            ->addBody($body);

        // add getUnion
        $class->addMethod('getUnion')
            ->setPublic()
            ->setReturnType('?string')
            ->setBody('return $this->union;');

        $this->fileAccess->saveFile(
            $classname,
            $namespace->add('Fields'),
            $outputDir . '/Fields',
            $class,
        );

        return $fullname;
    }
}
