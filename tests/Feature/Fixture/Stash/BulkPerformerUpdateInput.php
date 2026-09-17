<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class BulkPerformerUpdateInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?string $clientMutationId;

    /** @var array<string> */
    public ?array $ids;
    public ?string $disambiguation;
    public ?string $url;
    public ?BulkUpdateStrings $urls;
    public ?GenderEnum $gender;
    public ?string $birthdate;
    public ?string $ethnicity;
    public ?string $country;
    public ?string $eye_color;
    public ?int $height_cm;
    public ?string $measurements;
    public ?string $fake_tits;
    public ?float $penis_length;
    public ?CircumcisedEnum $circumcised;
    public ?string $career_length;
    public ?string $career_start;
    public ?string $career_end;
    public ?string $tattoos;
    public ?string $piercings;
    public ?BulkUpdateStrings $alias_list;
    public ?string $twitter;
    public ?string $instagram;
    public ?bool $favorite;
    public ?BulkUpdateIds $tag_ids;
    public ?int $rating100;
    public ?string $details;
    public ?string $death_date;
    public ?string $hair_color;
    public ?int $weight;
    public ?bool $ignore_auto_tag;
    public ?CustomFieldsInput $custom_fields;

    /**
     * @param array<string> $ids
     */
    public static function new(
        ?string $clientMutationId = null,
        ?array $ids = null,
        ?string $disambiguation = null,
        ?string $url = null,
        ?BulkUpdateStrings $urls = null,
        ?GenderEnum $gender = null,
        ?string $birthdate = null,
        ?string $ethnicity = null,
        ?string $country = null,
        ?string $eye_color = null,
        ?int $height_cm = null,
        ?string $measurements = null,
        ?string $fake_tits = null,
        ?float $penis_length = null,
        ?CircumcisedEnum $circumcised = null,
        ?string $career_length = null,
        ?string $career_start = null,
        ?string $career_end = null,
        ?string $tattoos = null,
        ?string $piercings = null,
        ?BulkUpdateStrings $alias_list = null,
        ?string $twitter = null,
        ?string $instagram = null,
        ?bool $favorite = null,
        ?BulkUpdateIds $tag_ids = null,
        ?int $rating100 = null,
        ?string $details = null,
        ?string $death_date = null,
        ?string $hair_color = null,
        ?int $weight = null,
        ?bool $ignore_auto_tag = null,
        ?CustomFieldsInput $custom_fields = null,
    ): self {
        $self = new self();
        $self->clientMutationId = $clientMutationId;
        $self->ids = $ids;
        $self->disambiguation = $disambiguation;
        $self->url = $url;
        $self->urls = $urls;
        $self->gender = $gender;
        $self->birthdate = $birthdate;
        $self->ethnicity = $ethnicity;
        $self->country = $country;
        $self->eye_color = $eye_color;
        $self->height_cm = $height_cm;
        $self->measurements = $measurements;
        $self->fake_tits = $fake_tits;
        $self->penis_length = $penis_length;
        $self->circumcised = $circumcised;
        $self->career_length = $career_length;
        $self->career_start = $career_start;
        $self->career_end = $career_end;
        $self->tattoos = $tattoos;
        $self->piercings = $piercings;
        $self->alias_list = $alias_list;
        $self->twitter = $twitter;
        $self->instagram = $instagram;
        $self->favorite = $favorite;
        $self->tag_ids = $tag_ids;
        $self->rating100 = $rating100;
        $self->details = $details;
        $self->death_date = $death_date;
        $self->hair_color = $hair_color;
        $self->weight = $weight;
        $self->ignore_auto_tag = $ignore_auto_tag;
        $self->custom_fields = $custom_fields;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('clientMutationId', $data)) {
            $self->clientMutationId = $data['clientMutationId'];
        }
        if (array_key_exists('ids', $data)) {
            $self->ids = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['ids'] ?? []);
        }
        if (array_key_exists('disambiguation', $data)) {
            $self->disambiguation = $data['disambiguation'];
        }
        if (array_key_exists('url', $data)) {
            $self->url = $data['url'];
        }
        if (array_key_exists('urls', $data)) {
            $self->urls = \Tests\Feature\Fixture\Stash\BulkUpdateStrings::fromArray($data['urls']);
        }
        if (array_key_exists('gender', $data)) {
            $self->gender = \Tests\Feature\Fixture\Stash\GenderEnum::from($data['gender']);
        }
        if (array_key_exists('birthdate', $data)) {
            $self->birthdate = $data['birthdate'];
        }
        if (array_key_exists('ethnicity', $data)) {
            $self->ethnicity = $data['ethnicity'];
        }
        if (array_key_exists('country', $data)) {
            $self->country = $data['country'];
        }
        if (array_key_exists('eye_color', $data)) {
            $self->eye_color = $data['eye_color'];
        }
        if (array_key_exists('height_cm', $data)) {
            $self->height_cm = $data['height_cm'];
        }
        if (array_key_exists('measurements', $data)) {
            $self->measurements = $data['measurements'];
        }
        if (array_key_exists('fake_tits', $data)) {
            $self->fake_tits = $data['fake_tits'];
        }
        if (array_key_exists('penis_length', $data)) {
            $self->penis_length = $data['penis_length'];
        }
        if (array_key_exists('circumcised', $data)) {
            $self->circumcised = \Tests\Feature\Fixture\Stash\CircumcisedEnum::from($data['circumcised']);
        }
        if (array_key_exists('career_length', $data)) {
            $self->career_length = $data['career_length'];
        }
        if (array_key_exists('career_start', $data)) {
            $self->career_start = $data['career_start'];
        }
        if (array_key_exists('career_end', $data)) {
            $self->career_end = $data['career_end'];
        }
        if (array_key_exists('tattoos', $data)) {
            $self->tattoos = $data['tattoos'];
        }
        if (array_key_exists('piercings', $data)) {
            $self->piercings = $data['piercings'];
        }
        if (array_key_exists('alias_list', $data)) {
            $self->alias_list = \Tests\Feature\Fixture\Stash\BulkUpdateStrings::fromArray($data['alias_list']);
        }
        if (array_key_exists('twitter', $data)) {
            $self->twitter = $data['twitter'];
        }
        if (array_key_exists('instagram', $data)) {
            $self->instagram = $data['instagram'];
        }
        if (array_key_exists('favorite', $data)) {
            $self->favorite = $data['favorite'];
        }
        if (array_key_exists('tag_ids', $data)) {
            $self->tag_ids = \Tests\Feature\Fixture\Stash\BulkUpdateIds::fromArray($data['tag_ids']);
        }
        if (array_key_exists('rating100', $data)) {
            $self->rating100 = $data['rating100'];
        }
        if (array_key_exists('details', $data)) {
            $self->details = $data['details'];
        }
        if (array_key_exists('death_date', $data)) {
            $self->death_date = $data['death_date'];
        }
        if (array_key_exists('hair_color', $data)) {
            $self->hair_color = $data['hair_color'];
        }
        if (array_key_exists('weight', $data)) {
            $self->weight = $data['weight'];
        }
        if (array_key_exists('ignore_auto_tag', $data)) {
            $self->ignore_auto_tag = $data['ignore_auto_tag'];
        }
        if (array_key_exists('custom_fields', $data)) {
            $self->custom_fields = \Tests\Feature\Fixture\Stash\CustomFieldsInput::fromArray($data['custom_fields']);
        }

        return $self;
    }
}
