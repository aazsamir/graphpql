<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

enum ScrapeContentType: string implements \Aazsamir\Graphpql\Model\GraphEnum
{
    case GALLERY = 'GALLERY';
    case IMAGE = 'IMAGE';
    case MOVIE = 'MOVIE';
    case GROUP = 'GROUP';
    case PERFORMER = 'PERFORMER';
    case SCENE = 'SCENE';
}
