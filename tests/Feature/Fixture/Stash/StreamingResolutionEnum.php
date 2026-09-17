<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

enum StreamingResolutionEnum: string implements \Aazsamir\Graphpql\Model\GraphEnum
{
    case LOW = 'LOW';
    case STANDARD = 'STANDARD';
    case STANDARD_HD = 'STANDARD_HD';
    case FULL_HD = 'FULL_HD';
    case FOUR_K = 'FOUR_K';
    case ORIGINAL = 'ORIGINAL';
}
