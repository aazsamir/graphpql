<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

enum SystemStatusEnum: string implements \Aazsamir\Graphpql\Model\GraphEnum
{
    case SETUP = 'SETUP';
    case NEEDS_MIGRATION = 'NEEDS_MIGRATION';
    case OK = 'OK';
}
