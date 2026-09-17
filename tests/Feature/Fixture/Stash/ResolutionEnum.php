<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

enum ResolutionEnum: string implements \Aazsamir\Graphpql\Model\GraphEnum
{
    case VERY_LOW = 'VERY_LOW';
    case LOW = 'LOW';
    case R360P = 'R360P';
    case STANDARD = 'STANDARD';
    case WEB_HD = 'WEB_HD';
    case STANDARD_HD = 'STANDARD_HD';
    case FULL_HD = 'FULL_HD';
    case QUAD_HD = 'QUAD_HD';

    /** @deprecated Use 4K instead */
    case VR_HD = 'VR_HD';
    case FOUR_K = 'FOUR_K';
    case FIVE_K = 'FIVE_K';
    case SIX_K = 'SIX_K';
    case SEVEN_K = 'SEVEN_K';
    case EIGHT_K = 'EIGHT_K';
    case HUGE = 'HUGE';
}
