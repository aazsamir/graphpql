<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

enum GenderEnum: string implements \Aazsamir\Graphpql\Model\GraphEnum
{
    case MALE = 'MALE';
    case FEMALE = 'FEMALE';
    case TRANSGENDER_MALE = 'TRANSGENDER_MALE';
    case TRANSGENDER_FEMALE = 'TRANSGENDER_FEMALE';
    case INTERSEX = 'INTERSEX';
    case NON_BINARY = 'NON_BINARY';
}
