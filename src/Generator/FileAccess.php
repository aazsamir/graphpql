<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Generator;

use Nette\PhpGenerator\ClassLike;
use Nette\PhpGenerator\PhpFile;
use Nette\PhpGenerator\PhpNamespace;
use Nette\PhpGenerator\PsrPrinter;

class FileAccess
{
    public function ensureClearDir(string $outputDir): void
    {
        $this->rrmdir($outputDir);
    }

    private function rrmdir(string $dir): void
    {
        if (is_dir($dir)) {
            $objects = scandir($dir);

            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (is_dir($dir . DIRECTORY_SEPARATOR . $object) && !is_link($dir . "/" . $object)) {
                        $this->rrmdir($dir . DIRECTORY_SEPARATOR . $object);
                    } else {
                        unlink($dir . DIRECTORY_SEPARATOR . $object);
                    }
                }
            }

            rmdir($dir);
        }
    }

    public function saveFile(string $name, Namespaced $namespace, string $outputDir, ClassLike $item): void
    {
        $namespaceItem = new PhpNamespace(ltrim($namespace->toString(), "\\"));

        $file = new PhpFile();
        $file->addNamespace($namespaceItem)->add($item);
        $file->setStrictTypes(true);
        $printer = new PsrPrinter();
        $printer->setTypeResolving(true);
        $filename = $outputDir . '/' . $name . '.php';

        if (!\is_dir(dirname($filename))) {
            mkdir(dirname($filename));
        }

        \file_put_contents($filename, $printer->printFile($file));
    }
}