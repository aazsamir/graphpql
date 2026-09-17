<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

enum PackageType: string implements \Aazsamir\Graphpql\Model\GraphEnum
{
    case Scraper = 'Scraper';
    case Plugin = 'Plugin';
}
