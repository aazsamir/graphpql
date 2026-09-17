<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

enum CircumcisedEnum: string implements \Aazsamir\Graphpql\Model\GraphEnum
{
    case CUT = 'CUT';
    case UNCUT = 'UNCUT';
}
