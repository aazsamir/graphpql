<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ConfigImageLightboxResult implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?int $slideshowDelay;
    public ?ImageLightboxDisplayMode $displayMode;
    public ?bool $scaleUp;
    public ?bool $resetZoomOnNav;
    public ?ImageLightboxScrollMode $scrollMode;
    public int $scrollAttemptsBeforeChange;
    public ?bool $disableAnimation;

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ConfigImageLightboxResultField<mixed>
     */
    public static function slideshowDelay(): Fields\ConfigImageLightboxResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ConfigImageLightboxResultField::slideshowDelay();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ConfigImageLightboxResultField<mixed>
     */
    public static function displayMode(): Fields\ConfigImageLightboxResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ConfigImageLightboxResultField::displayMode();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ConfigImageLightboxResultField<mixed>
     */
    public static function scaleUp(): Fields\ConfigImageLightboxResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ConfigImageLightboxResultField::scaleUp();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ConfigImageLightboxResultField<mixed>
     */
    public static function resetZoomOnNav(): Fields\ConfigImageLightboxResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ConfigImageLightboxResultField::resetZoomOnNav();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ConfigImageLightboxResultField<mixed>
     */
    public static function scrollMode(): Fields\ConfigImageLightboxResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ConfigImageLightboxResultField::scrollMode();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ConfigImageLightboxResultField<mixed>
     */
    public static function scrollAttemptsBeforeChange(): Fields\ConfigImageLightboxResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ConfigImageLightboxResultField::scrollAttemptsBeforeChange();
    }

    /**
     * @return \Tests\Feature\Fixture\Stash\Fields\ConfigImageLightboxResultField<mixed>
     */
    public static function disableAnimation(): Fields\ConfigImageLightboxResultField
    {
        return \Tests\Feature\Fixture\Stash\Fields\ConfigImageLightboxResultField::disableAnimation();
    }

    public static function new(
        int $scrollAttemptsBeforeChange,
        ?int $slideshowDelay = null,
        ?ImageLightboxDisplayMode $displayMode = null,
        ?bool $scaleUp = null,
        ?bool $resetZoomOnNav = null,
        ?ImageLightboxScrollMode $scrollMode = null,
        ?bool $disableAnimation = null,
    ): self {
        $self = new self();
        $self->scrollAttemptsBeforeChange = $scrollAttemptsBeforeChange;
        $self->slideshowDelay = $slideshowDelay;
        $self->displayMode = $displayMode;
        $self->scaleUp = $scaleUp;
        $self->resetZoomOnNav = $resetZoomOnNav;
        $self->scrollMode = $scrollMode;
        $self->disableAnimation = $disableAnimation;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('scrollAttemptsBeforeChange', $data)) {
            $self->scrollAttemptsBeforeChange = $data['scrollAttemptsBeforeChange'];
        }
        if (array_key_exists('slideshowDelay', $data)) {
            $self->slideshowDelay = $data['slideshowDelay'];
        }
        if (array_key_exists('displayMode', $data)) {
            $self->displayMode = \Tests\Feature\Fixture\Stash\ImageLightboxDisplayMode::from($data['displayMode']);
        }
        if (array_key_exists('scaleUp', $data)) {
            $self->scaleUp = $data['scaleUp'];
        }
        if (array_key_exists('resetZoomOnNav', $data)) {
            $self->resetZoomOnNav = $data['resetZoomOnNav'];
        }
        if (array_key_exists('scrollMode', $data)) {
            $self->scrollMode = \Tests\Feature\Fixture\Stash\ImageLightboxScrollMode::from($data['scrollMode']);
        }
        if (array_key_exists('disableAnimation', $data)) {
            $self->disableAnimation = $data['disableAnimation'];
        }

        return $self;
    }
}
