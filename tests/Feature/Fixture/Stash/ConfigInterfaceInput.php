<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ConfigInterfaceInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    public ?bool $sfwContentMode;

    /** @var array<string> */
    public ?array $menuItems;
    public ?bool $soundOnPreview;
    public ?bool $wallShowTitle;
    public ?string $wallPlayback;
    public ?bool $showScrubber;
    public ?int $maximumLoopDuration;
    public ?bool $autostartVideo;
    public ?bool $autostartVideoOnPlaySelected;
    public ?bool $continuePlaylistDefault;
    public ?bool $showStudioAsText;
    public ?string $css;
    public ?bool $cssEnabled;
    public ?string $javascript;
    public ?bool $javascriptEnabled;
    public ?string $customLocales;
    public ?bool $customLocalesEnabled;
    public ?bool $disableCustomizations;
    public ?string $language;
    public ?ConfigImageLightboxInput $imageLightbox;
    public ?ConfigDisableDropdownCreateInput $disableDropdownCreate;
    public ?string $handyKey;
    public ?int $funscriptOffset;
    public ?bool $useStashHostedFunscript;
    public ?bool $noBrowser;
    public ?bool $notificationsEnabled;

    /**
     * @param array<string> $menuItems
     */
    public static function new(
        ?bool $sfwContentMode = null,
        ?array $menuItems = null,
        ?bool $soundOnPreview = null,
        ?bool $wallShowTitle = null,
        ?string $wallPlayback = null,
        ?bool $showScrubber = null,
        ?int $maximumLoopDuration = null,
        ?bool $autostartVideo = null,
        ?bool $autostartVideoOnPlaySelected = null,
        ?bool $continuePlaylistDefault = null,
        ?bool $showStudioAsText = null,
        ?string $css = null,
        ?bool $cssEnabled = null,
        ?string $javascript = null,
        ?bool $javascriptEnabled = null,
        ?string $customLocales = null,
        ?bool $customLocalesEnabled = null,
        ?bool $disableCustomizations = null,
        ?string $language = null,
        ?ConfigImageLightboxInput $imageLightbox = null,
        ?ConfigDisableDropdownCreateInput $disableDropdownCreate = null,
        ?string $handyKey = null,
        ?int $funscriptOffset = null,
        ?bool $useStashHostedFunscript = null,
        ?bool $noBrowser = null,
        ?bool $notificationsEnabled = null,
    ): self {
        $self = new self();
        $self->sfwContentMode = $sfwContentMode;
        $self->menuItems = $menuItems;
        $self->soundOnPreview = $soundOnPreview;
        $self->wallShowTitle = $wallShowTitle;
        $self->wallPlayback = $wallPlayback;
        $self->showScrubber = $showScrubber;
        $self->maximumLoopDuration = $maximumLoopDuration;
        $self->autostartVideo = $autostartVideo;
        $self->autostartVideoOnPlaySelected = $autostartVideoOnPlaySelected;
        $self->continuePlaylistDefault = $continuePlaylistDefault;
        $self->showStudioAsText = $showStudioAsText;
        $self->css = $css;
        $self->cssEnabled = $cssEnabled;
        $self->javascript = $javascript;
        $self->javascriptEnabled = $javascriptEnabled;
        $self->customLocales = $customLocales;
        $self->customLocalesEnabled = $customLocalesEnabled;
        $self->disableCustomizations = $disableCustomizations;
        $self->language = $language;
        $self->imageLightbox = $imageLightbox;
        $self->disableDropdownCreate = $disableDropdownCreate;
        $self->handyKey = $handyKey;
        $self->funscriptOffset = $funscriptOffset;
        $self->useStashHostedFunscript = $useStashHostedFunscript;
        $self->noBrowser = $noBrowser;
        $self->notificationsEnabled = $notificationsEnabled;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('sfwContentMode', $data)) {
            $self->sfwContentMode = $data['sfwContentMode'];
        }
        if (array_key_exists('menuItems', $data)) {
            $self->menuItems = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['menuItems'] ?? []);
        }
        if (array_key_exists('soundOnPreview', $data)) {
            $self->soundOnPreview = $data['soundOnPreview'];
        }
        if (array_key_exists('wallShowTitle', $data)) {
            $self->wallShowTitle = $data['wallShowTitle'];
        }
        if (array_key_exists('wallPlayback', $data)) {
            $self->wallPlayback = $data['wallPlayback'];
        }
        if (array_key_exists('showScrubber', $data)) {
            $self->showScrubber = $data['showScrubber'];
        }
        if (array_key_exists('maximumLoopDuration', $data)) {
            $self->maximumLoopDuration = $data['maximumLoopDuration'];
        }
        if (array_key_exists('autostartVideo', $data)) {
            $self->autostartVideo = $data['autostartVideo'];
        }
        if (array_key_exists('autostartVideoOnPlaySelected', $data)) {
            $self->autostartVideoOnPlaySelected = $data['autostartVideoOnPlaySelected'];
        }
        if (array_key_exists('continuePlaylistDefault', $data)) {
            $self->continuePlaylistDefault = $data['continuePlaylistDefault'];
        }
        if (array_key_exists('showStudioAsText', $data)) {
            $self->showStudioAsText = $data['showStudioAsText'];
        }
        if (array_key_exists('css', $data)) {
            $self->css = $data['css'];
        }
        if (array_key_exists('cssEnabled', $data)) {
            $self->cssEnabled = $data['cssEnabled'];
        }
        if (array_key_exists('javascript', $data)) {
            $self->javascript = $data['javascript'];
        }
        if (array_key_exists('javascriptEnabled', $data)) {
            $self->javascriptEnabled = $data['javascriptEnabled'];
        }
        if (array_key_exists('customLocales', $data)) {
            $self->customLocales = $data['customLocales'];
        }
        if (array_key_exists('customLocalesEnabled', $data)) {
            $self->customLocalesEnabled = $data['customLocalesEnabled'];
        }
        if (array_key_exists('disableCustomizations', $data)) {
            $self->disableCustomizations = $data['disableCustomizations'];
        }
        if (array_key_exists('language', $data)) {
            $self->language = $data['language'];
        }
        if (array_key_exists('imageLightbox', $data)) {
            $self->imageLightbox = \Tests\Feature\Fixture\Stash\ConfigImageLightboxInput::fromArray($data['imageLightbox']);
        }
        if (array_key_exists('disableDropdownCreate', $data)) {
            $self->disableDropdownCreate = \Tests\Feature\Fixture\Stash\ConfigDisableDropdownCreateInput::fromArray($data['disableDropdownCreate']);
        }
        if (array_key_exists('handyKey', $data)) {
            $self->handyKey = $data['handyKey'];
        }
        if (array_key_exists('funscriptOffset', $data)) {
            $self->funscriptOffset = $data['funscriptOffset'];
        }
        if (array_key_exists('useStashHostedFunscript', $data)) {
            $self->useStashHostedFunscript = $data['useStashHostedFunscript'];
        }
        if (array_key_exists('noBrowser', $data)) {
            $self->noBrowser = $data['noBrowser'];
        }
        if (array_key_exists('notificationsEnabled', $data)) {
            $self->notificationsEnabled = $data['notificationsEnabled'];
        }

        return $self;
    }
}
