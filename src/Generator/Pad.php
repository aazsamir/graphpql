<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Generator;

class Pad
{
    public static function multipad(string $string, int $indent, bool $noFirstLine = true): string
    {
        $lines = explode("\n", $string);

        foreach ($lines as $i => &$line) {
            if ($i === 0 && $noFirstLine) {
                continue;
            }

            $line = self::pad($line, $indent);
        }

        return \implode("\n", $lines);
    }

    public static function pad(string $string, int $indent): string
    {
        return \str_repeat(' ', $indent * 4) . $string;
    }
}
