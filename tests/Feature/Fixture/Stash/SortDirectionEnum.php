<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

enum SortDirectionEnum: string implements \Aazsamir\Graphpql\Model\GraphEnum
{
    case ASC = 'ASC';
    case DESC = 'DESC';
}
