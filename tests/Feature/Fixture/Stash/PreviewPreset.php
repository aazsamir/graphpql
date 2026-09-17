<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

enum PreviewPreset: string implements \Aazsamir\Graphpql\Model\GraphEnum
{
    case ultrafast = 'ultrafast';
    case veryfast = 'veryfast';
    case fast = 'fast';
    case medium = 'medium';
    case slow = 'slow';
    case slower = 'slower';
    case veryslow = 'veryslow';
}
