<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ConfigScrapingInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?string $scraperUserAgent;
    public ?string $scraperCDPPath;
    public ?bool $scraperCertCheck;

    /** @var array<string> */
    public ?array $excludeTagPatterns;

    /**
     * @param array<string> $excludeTagPatterns
     */
    public static function new(
        ?string $scraperUserAgent = null,
        ?string $scraperCDPPath = null,
        ?bool $scraperCertCheck = null,
        ?array $excludeTagPatterns = null,
    ): self {
        $self = new self();
        $self->scraperUserAgent = $scraperUserAgent;
        $self->scraperCDPPath = $scraperCDPPath;
        $self->scraperCertCheck = $scraperCertCheck;
        $self->excludeTagPatterns = $excludeTagPatterns;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('scraperUserAgent', $data)) {
            $self->scraperUserAgent = $data['scraperUserAgent'];
        }
        if (array_key_exists('scraperCDPPath', $data)) {
            $self->scraperCDPPath = $data['scraperCDPPath'];
        }
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

        return $self;
    }
}
