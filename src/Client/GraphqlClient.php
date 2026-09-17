<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Client;

use Aazsamir\Graphpql\GraphqlException;
use Aazsamir\Graphpql\Model\Operation;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Client\ClientInterface;

class GraphqlClient
{
    public function __construct(
        private ClientInterface $http,
        private ConnArgs $connArgs,
        private QueryBuilder $queryBuilder = new QueryBuilder(),
        private bool $throwOnErrors = true,
    ) {}

    public function request(Operation $operation): Response
    {
        $queryString = $this->queryBuilder->fromOperation($operation);
        $response = $this->doQuery($queryString);
        $this->handleErrors($response);

        $data = null;

        if (isset($response['data']) && \is_array($response['data'])) {
            $data = array_first($response['data']);
        }

        return new Response(
            $data,
            $response['errors'] ?? [],
        );
    }

    /**
     * @param array<string|int, Operation> $operations
     *
     * @return mixed[]
     */
    public function requestMultiple(array $operations): array
    {
        $indexed = [];

        // force string indexing
        foreach ($operations as $index => $operation) {
            if (is_numeric($index)) {
                $index = "a{$index}";
            }

            $indexed[$index] = $operation;
        }

        $operations = $indexed;

        $queryString = $this->queryBuilder->fromOperations($operations);
        $response = $this->doQuery($queryString);
        $this->handleErrors($response);

        if (!isset($response['data']) || !\is_array($response['data'])) {
            throw new GraphqlException('Multiple operations failed ' . json_encode($response));
        }

        $results = [];

        foreach ($operations as $index => $operation) {
            $results[$index] = $operation->serializeResponse(
                new Response($response['data'][$index], $response['errors'] ?? []),
            );
        }

        return $results;
    }

    /**
     * @param array<mixed> $response
     */
    private function handleErrors(array $response): void
    {
        if (!$this->throwOnErrors || empty($response['errors'])) {
            return;
        }

        $message = 'GraphQL error';

        foreach ($response['errors'] as $error) {
            $message = $error['message'] ?? 'GraphQL error';
            break;
        }

        throw new GraphqlException(message: $message, response: $response);
    }

    /**
     * @param array<mixed> $variables
     *
     * @return array<mixed>
     */
    private function doQuery(string $query, array $variables = []): array
    {
        $body = [
            'query' => $query,
        ];

        if (!empty($variables)) {
            $variables = json_encode($variables);
            $body['variables'] = $variables;
        }

        $body = json_encode($body, flags: \JSON_THROW_ON_ERROR);

        return $this->doRequest($body);
    }

    /**
     * @return array<mixed>
     */
    private function doRequest(string $body): array
    {
        $request = new Request(
            'POST',
            $this->connArgs->endpoint,
            [
                'Content-Type' => 'application/json',
                'User-Agent' => 'graphpql/1.0',
            ],
            trim($body),
        );

        $response = $this->http->sendRequest($request);

        return json_decode($response->getBody()->getContents(), true, flags: \JSON_THROW_ON_ERROR);
    }
}
