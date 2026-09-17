<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

enum FilterMode: string implements \Aazsamir\Graphpql\Model\GraphEnum
{
    case SCENES = 'SCENES';
    case PERFORMERS = 'PERFORMERS';
    case STUDIOS = 'STUDIOS';
    case GALLERIES = 'GALLERIES';
    case SCENE_MARKERS = 'SCENE_MARKERS';
    case MOVIES = 'MOVIES';
    case GROUPS = 'GROUPS';
    case TAGS = 'TAGS';
    case IMAGES = 'IMAGES';
}
