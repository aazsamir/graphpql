<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

enum CriterionModifier: string implements \Aazsamir\Graphpql\Model\GraphEnum
{
    case EQUALS = 'EQUALS';
    case NOT_EQUALS = 'NOT_EQUALS';
    case GREATER_THAN = 'GREATER_THAN';
    case LESS_THAN = 'LESS_THAN';
    case IS_NULL = 'IS_NULL';
    case NOT_NULL = 'NOT_NULL';
    case INCLUDES_ALL = 'INCLUDES_ALL';
    case INCLUDES = 'INCLUDES';
    case EXCLUDES = 'EXCLUDES';
    case MATCHES_REGEX = 'MATCHES_REGEX';
    case NOT_MATCHES_REGEX = 'NOT_MATCHES_REGEX';
    case BETWEEN = 'BETWEEN';
    case NOT_BETWEEN = 'NOT_BETWEEN';
}
