<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Generator;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\EnumType;

interface FileAccess
{
    public function ensureClearDir(string $outputDir): void;

    public function saveFile(string $name, Namespaced $namespace, string $outputDir, ClassType|EnumType $item): void;
}
