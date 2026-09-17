<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class ConfigInterfaceResultField implements \Aazsamir\Graphpql\Model\ObjectField
{
    private(set) array $fieldVars = [];
    private string $name;
    private \Aazsamir\Graphpql\Model\SelectionSet $child;
    private ?string $union = null;

    /**
     * @return self<mixed>
     */
    public static function sfwContentMode(): self
    {
        $instance = new self();
        $instance->name = 'sfwContentMode';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function menuItems(): self
    {
        $instance = new self();
        $instance->name = 'menuItems';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function soundOnPreview(): self
    {
        $instance = new self();
        $instance->name = 'soundOnPreview';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function wallShowTitle(): self
    {
        $instance = new self();
        $instance->name = 'wallShowTitle';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function wallPlayback(): self
    {
        $instance = new self();
        $instance->name = 'wallPlayback';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function showScrubber(): self
    {
        $instance = new self();
        $instance->name = 'showScrubber';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function maximumLoopDuration(): self
    {
        $instance = new self();
        $instance->name = 'maximumLoopDuration';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function noBrowser(): self
    {
        $instance = new self();
        $instance->name = 'noBrowser';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function notificationsEnabled(): self
    {
        $instance = new self();
        $instance->name = 'notificationsEnabled';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function autostartVideo(): self
    {
        $instance = new self();
        $instance->name = 'autostartVideo';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function autostartVideoOnPlaySelected(): self
    {
        $instance = new self();
        $instance->name = 'autostartVideoOnPlaySelected';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function continuePlaylistDefault(): self
    {
        $instance = new self();
        $instance->name = 'continuePlaylistDefault';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function showStudioAsText(): self
    {
        $instance = new self();
        $instance->name = 'showStudioAsText';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function css(): self
    {
        $instance = new self();
        $instance->name = 'css';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function cssEnabled(): self
    {
        $instance = new self();
        $instance->name = 'cssEnabled';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function javascript(): self
    {
        $instance = new self();
        $instance->name = 'javascript';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function javascriptEnabled(): self
    {
        $instance = new self();
        $instance->name = 'javascriptEnabled';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function customLocales(): self
    {
        $instance = new self();
        $instance->name = 'customLocales';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function customLocalesEnabled(): self
    {
        $instance = new self();
        $instance->name = 'customLocalesEnabled';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function disableCustomizations(): self
    {
        $instance = new self();
        $instance->name = 'disableCustomizations';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function language(): self
    {
        $instance = new self();
        $instance->name = 'language';

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\ConfigImageLightboxResultSelectionSet>
     */
    public static function imageLightbox(): self
    {
        $instance = new self();
        $instance->name = 'imageLightbox';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\ConfigImageLightboxResultSelectionSet();

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\ConfigDisableDropdownCreateSelectionSet>
     */
    public static function disableDropdownCreate(): self
    {
        $instance = new self();
        $instance->name = 'disableDropdownCreate';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\ConfigDisableDropdownCreateSelectionSet();

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function handyKey(): self
    {
        $instance = new self();
        $instance->name = 'handyKey';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function funscriptOffset(): self
    {
        $instance = new self();
        $instance->name = 'funscriptOffset';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function useStashHostedFunscript(): self
    {
        $instance = new self();
        $instance->name = 'useStashHostedFunscript';

        return $instance;
    }

    /**
     * @param callable(T): void $selection
     */
    public function selector(callable $selection): self
    {
        $selection($this->child);

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getChild(): ?\Aazsamir\Graphpql\Model\SelectionSet
    {
        if (isset($this->child)) {
            return $this->child;
        }

        return null;
    }

    public function getUnion(): ?string
    {
        return $this->union;
    }
}
