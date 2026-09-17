<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

enum ScrapeType: string implements \Aazsamir\Graphpql\Model\GraphEnum
{
    case NAME = 'NAME';
    case FRAGMENT = 'FRAGMENT';
    case URL = 'URL';
}
