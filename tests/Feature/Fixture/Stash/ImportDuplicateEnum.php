<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

enum ImportDuplicateEnum: string implements \Aazsamir\Graphpql\Model\GraphEnum
{
    case IGNORE = 'IGNORE';
    case OVERWRITE = 'OVERWRITE';
    case FAIL = 'FAIL';
}
