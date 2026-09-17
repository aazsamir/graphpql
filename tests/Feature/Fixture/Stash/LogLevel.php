<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

enum LogLevel: string implements \Aazsamir\Graphpql\Model\GraphEnum
{
    case Trace = 'Trace';
    case Debug = 'Debug';
    case Info = 'Info';
    case Progress = 'Progress';
    case Warning = 'Warning';
    case Error = 'Error';
}
