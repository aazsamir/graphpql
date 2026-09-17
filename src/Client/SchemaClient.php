<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Client;

use Aazsamir\Graphpql\GraphqlException;
use Aazsamir\Graphpql\Schema\EnumValue;
use Aazsamir\Graphpql\Schema\Field;
use Aazsamir\Graphpql\Schema\InputField;
use Aazsamir\Graphpql\Schema\Schema;
use Aazsamir\Graphpql\Schema\Type;
use Aazsamir\Graphpql\Schema\TypeKind;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Client\ClientInterface;

class SchemaClient
{
    public function __construct(
        private ClientInterface $http,
    ) {}

    /**
     * @return array<mixed>
     */
    public function fetchRawSchema(ConnArgs $conn): array
    {
        $query = <<<'GRAPHQL'
        query IntrospectionQuery {
            __schema {
                queryType {
                    ...RootType
                }
                mutationType {
                    ...RootType
                }
                subscriptionType {
                    ...RootType
                }

                types {
                    ...FullType
                }

                directives {
                    name
                    description
                    locations
                    args {
                        ...InputValue
                    }
                }
            }
        }

        fragment FullType on __Type {
            kind
            name
            description
            fields(includeDeprecated: true) {
                name
                description
                args {
                    ...InputValue
                }
                type {
                    ...TypeRef
                }
                isDeprecated
                deprecationReason
            }
            inputFields {
                ...InputValue
            }
            interfaces {
                ...TypeRef
            }
            enumValues(includeDeprecated: true) {
                name
                description
                isDeprecated
                deprecationReason
            }
            possibleTypes {
                ...TypeRef
            }
        }

        fragment InputValue on __InputValue {
            name
            description
            type {
                ...TypeRef
            }
            defaultValue
        }

        fragment TypeRef on __Type {
            kind
            name
            ofType {
                kind
                name
                ofType {
                    kind
                    name
                    ofType {
                        kind
                        name
                        ofType {
                            kind
                            name
                            ofType {
                                kind
                                name
                                ofType {
                                    kind
                                    name
                                    ofType {
                                        kind
                                        name
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        fragment RootType on __Type {
            name
            fields(includeDeprecated: true) {
                name
                description
                args {
                    ...InputValue
                }
                type {
                    ...TypeRef
                }
                isDeprecated
                deprecationReason
            }
        }
        GRAPHQL;

        return $this->doQuery($conn, $query);
    }

    public function fetchSchema(ConnArgs $conn): Schema
    {
        $response = $this->fetchRawSchema($conn);
        $types = [];
        $queries = [];
        $mutations = [];

        if (empty($response['data'])) {
            throw new GraphqlException('Introspection failed. ' . json_encode($response['errors'] ?? []));
        }

        foreach ($response['data']['__schema']['types'] as $type) {
            $typeInstance = $this->parseType($type);
            $types[] = $typeInstance;
        }

        foreach ($response['data']['__schema']['queryType']['fields'] ?? [] as $queryType) {
            $query = $this->parseField($queryType);
            $queries[] = $query;
        }

        foreach ($response['data']['__schema']['mutationType']['fields'] ?? [] as $mutationType) {
            $mutation = $this->parseField($mutationType);
            $mutations[] = $mutation;
        }

        return new Schema($types, $queries, $mutations);
    }

    /**
     * @param array<mixed> $type
     */
    private function parseType(array $type): Type
    {
        [$fields, $inputFields, $enumValues] = $this->parseProperties($type);

        return new Type(
            name: $type['name'],
            kind: TypeKind::from($type['kind']),
            description: $type['description'] ?? null,
            fields: $fields,
            inputFields: $inputFields,
            interfaces: $type['interfaces'] ?? [],
            enumValues: $enumValues,
            possibleTypes: array_map($this->parseType(...), $type['possibleTypes'] ?? []),
        );
    }

    /**
     * @param array<mixed> $data
     * 
     * @return array<mixed>
     */
    private function parseProperties(array $data): array
    {
        $fields = [];
        $inputFields = [];
        $enumValues = [];

        if (isset($data['fields'])) {
            foreach ($data['fields'] as $field) {
                $fields[] = $this->parseField($field);
            }
        }

        if (isset($data['inputFields'])) {
            foreach ($data['inputFields'] as $inputField) {
                $inputFields[] = new InputField(
                    name: $inputField['name'],
                    description: $inputField['description'],
                    type: Type::fromArray($inputField['type']),
                    defaultValue: $inputField['defaultValue']
                );
            }
        }

        if (isset($data['enumValues'])) {
            foreach ($data['enumValues'] as $enumValue) {
                $enumValues[] = new EnumValue(
                    name: $enumValue['name'],
                    description: $enumValue['description'],
                    isDeprecated: $enumValue['isDeprecated'] ?? false,
                    deprecationReason: $enumValue['deprecationReason'] ?? null,
                );
            }
        }

        return [$fields, $inputFields, $enumValues];
    }

    /**
     * @param array<mixed> $data
     */
    private function parseField(array $data): Field
    {
        $args = [];

        foreach ($data['args'] ?? [] as $arg) {
            $args[] = new InputField(
                name: $arg['name'],
                description: $arg['description'],
                type: Type::fromArray($arg['type']),
                defaultValue: $arg['defaultValue']
            );
        }

        return new Field(
            name: $data['name'],
            description: $data['description'],
            args: $args,
            type: Type::fromArray($data['type']),
            isDeprecated: $data['isDeprecated'] ?? false,
            deprecationReason: $data['deprecationReason'] ?? null,
        );
    }

    /**
     * @param array<mixed> $variables
     * 
     * @return array<mixed>
     */
    private function doQuery(ConnArgs $conn, string $query, array $variables = []): array
    {
        $body = [
            'query' => $query,
        ];

        if (!empty($variables)) {
            $body['variables'] = $variables;
        }

        $body = json_encode($body);

        return $this->doRequest($conn, $body);
    }

    /**
     * @return array<mixed>
     */
    private function doRequest(ConnArgs $conn, string $body): array
    {
        $request = new Request(
            'POST',
            $conn->endpoint,
            [
                'Content-Type' => 'application/json',
            ],
            trim($body),
        );

        try {
            $response = $this->http->sendRequest($request);

            if ($response->getStatusCode() !== 200) {
                throw new GraphqlException('Query failed');
            }
        } catch (\Throwable $e) {
            throw new GraphqlException($e->getMessage(), previous: $e);
        }

        return json_decode($response->getBody()->getContents(), true);
    }
}
