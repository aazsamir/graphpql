<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Generator;

readonly class Namespaced
{
    public string $namespace;

    public function __construct(
        string $namespace,
    ) {
        $this->namespace = rtrim($namespace, "\\");
    }

    public function add(string $part): self
    {
        return new self($this->namespace . "\\" . $part);
    }

    public function toString(): string
    {
        return $this->__toString();
    }

    public function __toString()
    {
        return $this->namespace;
    }
}
