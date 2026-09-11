<?php

declare(strict_types=1);

namespace Aazsamir\Graphpql\Client;

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

    public function fetchSchema(ConnArgs $conn): Schema
    {
        $query = <<<GRAPHQL
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
            specifiedByURL
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
            inputFields(includeDeprecated: true) {
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
            isDeprecated
            deprecationReason
        }

        fragment TypeRef on __Type {
            kind
            name
            specifiedByURL
            ofType {
                kind
                name
                specifiedByURL
                ofType {
                    kind
                    name
                    specifiedByURL
                    ofType {
                        kind
                        name
                        specifiedByURL
                        ofType {
                            kind
                            name
                            specifiedByURL
                            ofType {
                                kind
                                name
                                specifiedByURL
                                ofType {
                                    kind
                                    name
                                    specifiedByURL
                                    ofType {
                                        kind
                                        name
                                        specifiedByURL
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
        $response = $this->doQuery($conn, $query);
        $types = [];
        $queries = [];
        $mutations = [];

        foreach ($response['data']['__schema']['types'] as $type) {
            $typeInstance = $this->parseType($type);
            $types[] = $typeInstance;
        }

        foreach ($response['data']['__schema']['queryType']['fields'] as $queryType) {
            $query = $this->parseField($queryType);
            $queries[] = $query;
        }

        foreach ($response['data']['__schema']['mutationType']['fields'] as $mutationType) {
            $mutation = $this->parseField($mutationType);
            $mutations[] = $mutation;
        }

        return new Schema($types, $queries, $mutations);
    }

    private function parseType(array $type): Type
    {
        [$fields, $inputFields, $enumValues] = $this->parseProperties($type);

        return new Type(
            name: $type['name'],
            kind: TypeKind::from($type['kind']),
            description: $type['description'] ?? null,
            fields: $fields,
            inputFields: $inputFields,
            interfaces: $type['interfaces'] ?? null,
            enumValues: $enumValues,
            // possibleTypes: $type['possibleTypes']
            possibleTypes: array_map($this->parseType(...), $type['possibleTypes'] ?? []),
        );
    }

    private function parseProperties(array $data): array
    {
        $fields = null;
        $inputFields = null;
        $enumValues = null;

        if (isset($data['fields'])) {
            $fields = [];

            foreach ($data['fields'] as $field) {
                $fields[] = $this->parseField($field);
            }
        }

        if (isset($data['inputFields'])) {
            $inputFields = [];

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
            $enumValues = [];

            foreach ($data['enumValues'] as $enumValue) {
                $enumValues[] = new EnumValue(
                    name: $enumValue['name'],
                    description: $enumValue['description'],
                    isDeprecated: $enumValue['isDeprecated'],
                    deprecationReason: $enumValue['deprecationReason']
                );
            }
        }

        return [$fields, $inputFields, $enumValues];
    }

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
            isDeprecated: $data['isDeprecated'] ?? null,
            deprecationReason: $data['deprecationReason'] ?? null,
        );
    }

    private function doQuery(ConnArgs $conn, string $query, array $variables = []): array
    {
        $body = [
            'query' => $query,
        ];

        if (!empty($variables)) {
            $variables = json_encode($variables);
            $body['variables'] = $variables;
        }

        $body = \json_encode($body);

        return $this->doRequest($conn, $body);
    }

    private function doRequest(ConnArgs $conn, array|string $body): array
    {
        $body = is_array($body) ? json_encode($body) : $body;
        $request = new Request(
            'POST',
            $conn->endpoint,
            [
                'Content-Type' => 'application/json',
            ],
            trim($body),
        );

        $response = $this->http->sendRequest($request);

        return json_decode($response->getBody()->getContents(), true);
    }
}
