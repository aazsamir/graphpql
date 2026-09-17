<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql;

class GraphqlException extends \Exception
{
    /**
     * @param ?array<mixed> $response
     */
    public function __construct(
        string $message = '',
        int $code = 0,
        ?\Throwable $previous = null,
        private ?array $response = null,
    ) {
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return ?array<mixed>
     */
    public function getResponse(): ?array
    {
        return $this->response;
    }
}
