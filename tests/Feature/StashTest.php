<?php

declare(strict_types=1);

namespace Tests\Feature;

use Aazsamir\Graphpql\Client\QueryBuilder;
use PHPUnit\Framework\Attributes\Test;
use Tests\Feature\Fixture\Stash\CriterionModifier;
use Tests\Feature\Fixture\Stash\CustomFieldCriterionInput;
use Tests\Feature\Fixture\Stash\Fields\ImageField;
use Tests\Feature\Fixture\Stash\Fields\ImageFileField;
use Tests\Feature\Fixture\Stash\Fields\VideoFileField;
use Tests\Feature\Fixture\Stash\Fields\VisualFileField;
use Tests\Feature\Fixture\Stash\FindImagesResultType;
use Tests\Feature\Fixture\Stash\ImageFilterType;
use Tests\Feature\Fixture\Stash\Query\FindImages;
use Tests\Feature\Fixture\Stash\StringCriterionInput;

class StashTest extends TestCase
{
    #[Test]
    public function testStash(): void
    {
        $this->testProjectGeneration(
            'Stash',
            '\\Tests\\Feature\\Fixture\\Stash',
        );
    }

    public function testQueryGeneration(): void
    {
        $query = new FindImages(
            ImageFilterType::new(
                path: StringCriterionInput::new(
                    'test%"abc"',
                    CriterionModifier::EQUALS,
                ),
                custom_fields: [
                    CustomFieldCriterionInput::new(
                        'field',
                        CriterionModifier::NOT_EQUALS,
                        ['var1', 'var2']
                    )
                ]
            )
        )->selector(fn ($x) => $x->select(
            FindImagesResultType::images()->selector(fn ($x) => $x->select(
                ImageField::visual_files()->selector(fn ($x) => $x->select(
                    VisualFileField::onImageFile()->selector(fn ($x) => $x->select(
                        ImageFileField::fingerprint('xxx')
                    )),
                    VisualFileField::onVideoFile()->selector(fn ($x) => $x->select(
                        VideoFileField::id(),
                    ))
                ))
            )),
        ));

        $queryBuilder = new QueryBuilder();
        $result = $queryBuilder->fromOperation($query);
        
        $expected = <<<'GRAPHQL'
        query {
            findImages(
                image_filter: {
                    path: {
                        value: "test%\"abc\""
                        modifier: EQUALS
                    }
                    custom_fields: [{
                            field: "field"
                            value: ["var1","var2"]
                            modifier: NOT_EQUALS
                        }]
                }
            ) {
                images {
                    visual_files {
                        ... on ImageFile  {
                            __typename
                            fingerprint(
                                type: "xxx"
                            )
                        }
                        ... on VideoFile  {
                            __typename
                            id
                        }
                    }
                }
            }
        }
        GRAPHQL;

        $this->assertSame(
            $this->normalizeLineEndings($expected),
            $this->normalizeLineEndings($result),
        );
    }

    private function normalizeLineEndings(string $string): string
    {
        return \str_replace("\r\n", "\n", $string);
    }
}