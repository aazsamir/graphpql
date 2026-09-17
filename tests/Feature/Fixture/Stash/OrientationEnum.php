<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

enum OrientationEnum: string implements \Aazsamir\Graphpql\Model\GraphEnum
{
    case LANDSCAPE = 'LANDSCAPE';
    case PORTRAIT = 'PORTRAIT';
    case SQUARE = 'SQUARE';
}
