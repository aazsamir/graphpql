<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

enum ImportMissingRefEnum: string implements \Aazsamir\Graphpql\Model\GraphEnum
{
    case IGNORE = 'IGNORE';
    case FAIL = 'FAIL';
    case CREATE = 'CREATE';
}
