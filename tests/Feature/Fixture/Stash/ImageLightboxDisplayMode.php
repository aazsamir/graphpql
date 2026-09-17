<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

enum ImageLightboxDisplayMode: string implements \Aazsamir\Graphpql\Model\GraphEnum
{
    case ORIGINAL = 'ORIGINAL';
    case FIT_XY = 'FIT_XY';
    case FIT_X = 'FIT_X';
}
