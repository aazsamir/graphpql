<?php

declare(strict_types=1);

namespace Tests\Mock;

use Aazsamir\Graphpql\Generator\FileAccess;
use Aazsamir\Graphpql\Generator\Namespaced;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\EnumType;
use Nette\PhpGenerator\PhpFile;
use Nette\PhpGenerator\PhpNamespace;
use Nette\PhpGenerator\PsrPrinter;

class MemoryFileAccess implements FileAccess
{
    public private(set) array $files = [];

    public function ensureClearDir(string $outputDir): void
    {
        // no-op
    }

    public function saveFile(string $name, Namespaced $namespace, string $outputDir, ClassType|EnumType $item): void
    {
        $namespaceItem = new PhpNamespace(ltrim($namespace->toString(), '\\'));

        $file = new PhpFile();
        $file->addNamespace($namespaceItem)->add($item);
        $file->setStrictTypes(true);
        $printer = new PsrPrinter();
        $printer->setTypeResolving(true);

        $filename = $outputDir . '/' . $name . '.php';
        $this->files[$filename] = $printer->printFile($file);
    }
    
}