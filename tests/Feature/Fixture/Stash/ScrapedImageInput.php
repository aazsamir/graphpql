<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ScrapedImageInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?string $title;
    public ?string $code;
    public ?string $details;

    /** @var array<string> */
    public ?array $urls;
    public ?string $date;

    /**
     * @param array<string> $urls
     */
    public static function new(
        ?string $title = null,
        ?string $code = null,
        ?string $details = null,
        ?array $urls = null,
        ?string $date = null,
    ): self {
        $self = new self();
        $self->title = $title;
        $self->code = $code;
        $self->details = $details;
        $self->urls = $urls;
        $self->date = $date;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('title', $data)) {
            $self->title = $data['title'];
        }
        if (array_key_exists('code', $data)) {
            $self->code = $data['code'];
        }
        if (array_key_exists('details', $data)) {
            $self->details = $data['details'];
        }
        if (array_key_exists('urls', $data)) {
            $self->urls = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['urls'] ?? []);
        }
        if (array_key_exists('date', $data)) {
            $self->date = $data['date'];
        }

        return $self;
    }
}
