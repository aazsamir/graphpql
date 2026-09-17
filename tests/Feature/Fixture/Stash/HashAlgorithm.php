<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

enum HashAlgorithm: string implements \Aazsamir\Graphpql\Model\GraphEnum
{
    case MD5 = 'MD5';
    case OSHASH = 'OSHASH';
}
