<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

enum ImageLightboxScrollMode: string implements \Aazsamir\Graphpql\Model\GraphEnum
{
    case ZOOM = 'ZOOM';
    case PAN_Y = 'PAN_Y';
}
