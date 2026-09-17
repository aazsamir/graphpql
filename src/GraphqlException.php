<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql;

use Throwable;

class GraphqlException extends \Exception
{
    public function __construct(
        string $message = "",
        int $code = 0,
        Throwable|null $previous = null,
        private ?array $response = null,
    ) {
        return parent::__construct($message, $code, $previous);
    }

    public function getResponse(): ?array
    {
        return $this->response;
    }
}
