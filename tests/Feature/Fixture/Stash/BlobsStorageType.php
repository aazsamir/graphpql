<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

enum BlobsStorageType: string implements \Aazsamir\Graphpql\Model\GraphEnum
{
    case DATABASE = 'DATABASE';
    case FILESYSTEM = 'FILESYSTEM';
}
