<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ConfigScrapingResult implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?string $scraperUserAgent;
    public ?string $scraperCDPPath;
    public bool $scraperCertCheck;

    /** @var array<string> */
    public array $excludeTagPatterns;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ConfigScrapingResultField<mixed>
     */
    public static function scraperUserAgent(): Fields\ConfigScrapingResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ConfigScrapingResultField::scraperUserAgent();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ConfigScrapingResultField<mixed>
     */
    public static function scraperCDPPath(): Fields\ConfigScrapingResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ConfigScrapingResultField::scraperCDPPath();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ConfigScrapingResultField<mixed>
     */
    public static function scraperCertCheck(): Fields\ConfigScrapingResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ConfigScrapingResultField::scraperCertCheck();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ConfigScrapingResultField<mixed>
     */
    public static function excludeTagPatterns(): Fields\ConfigScrapingResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ConfigScrapingResultField::excludeTagPatterns();
    }

    /**
     * @param array<string> $excludeTagPatterns
     */
    public static function new(
        bool $scraperCertCheck,
        array $excludeTagPatterns,
        ?string $scraperUserAgent = null,
        ?string $scraperCDPPath = null,
    ): self {
        $self = new self();
        $self->scraperCertCheck = $scraperCertCheck;
        $self->excludeTagPatterns = $excludeTagPatterns;
        $self->scraperUserAgent = $scraperUserAgent;
        $self->scraperCDPPath = $scraperCDPPath;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('scraperCertCheck', $data)) {
            $self->scraperCertCheck = $data['scraperCertCheck'];
        }
        if (array_key_exists('excludeTagPatterns', $data)) {
            $self->excludeTagPatterns = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['excludeTagPatterns'] ?? []);
        }
        if (array_key_exists('scraperUserAgent', $data)) {
            $self->scraperUserAgent = $data['scraperUserAgent'];
        }
        if (array_key_exists('scraperCDPPath', $data)) {
            $self->scraperCDPPath = $data['scraperCDPPath'];
        }

        return $self;
    }
}
