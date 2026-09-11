<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Client;

use Aazsamir\Graphpql\Model\Operation;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Client\ClientInterface;

class GraphqlClient
{
    public function __construct(
        private ClientInterface $http,
        private ConnArgs $connArgs,
        private QueryBuilder $queryBuilder,
    ) {}

    public function request(Operation $query): Response
    {
        $queryString = $this->queryBuilder->fromOperation($query);
        $response = $this->doQuery($queryString);
        $data = \array_first($response['data']);

        return new Response(
            $data,
            $response['errors'] ?? [],
        );
    }

    private function doQuery(string $query, array $variables = []): array
    {
        $body = [
            'query' => $query,
        ];

        if (!empty($variables)) {
            $variables = json_encode($variables);
            $body['variables'] = $variables;
        }

        $body = \json_encode($body);

        return $this->doRequest($body);
    }

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

        return json_decode($response->getBody()->getContents(), true);
    }
}
