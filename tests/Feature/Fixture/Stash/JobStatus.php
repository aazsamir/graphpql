<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

enum JobStatus: string implements \Aazsamir\Graphpql\Model\GraphEnum
{
    case READY = 'READY';
    case RUNNING = 'RUNNING';
    case FINISHED = 'FINISHED';
    case STOPPING = 'STOPPING';
    case CANCELLED = 'CANCELLED';
    case FAILED = 'FAILED';
}
