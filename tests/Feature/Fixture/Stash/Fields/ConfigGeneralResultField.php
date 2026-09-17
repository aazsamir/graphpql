<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class ConfigGeneralResultField implements \Aazsamir\Graphpql\Model\ObjectField
{
    private(set) array $fieldVars = [];
    private string $name;
    private \Aazsamir\Graphpql\Model\SelectionSet $child;
    private ?string $union = null;

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\StashConfigSelectionSet>
     */
    public static function stashes(): self
    {
        $instance = new self();
        $instance->name = 'stashes';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\StashConfigSelectionSet();

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function databasePath(): self
    {
        $instance = new self();
        $instance->name = 'databasePath';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function backupDirectoryPath(): self
    {
        $instance = new self();
        $instance->name = 'backupDirectoryPath';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function deleteTrashPath(): self
    {
        $instance = new self();
        $instance->name = 'deleteTrashPath';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function generatedPath(): self
    {
        $instance = new self();
        $instance->name = 'generatedPath';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function metadataPath(): self
    {
        $instance = new self();
        $instance->name = 'metadataPath';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function configFilePath(): self
    {
        $instance = new self();
        $instance->name = 'configFilePath';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function scrapersPath(): self
    {
        $instance = new self();
        $instance->name = 'scrapersPath';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function pluginsPath(): self
    {
        $instance = new self();
        $instance->name = 'pluginsPath';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function cachePath(): self
    {
        $instance = new self();
        $instance->name = 'cachePath';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function blobsPath(): self
    {
        $instance = new self();
        $instance->name = 'blobsPath';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function blobsStorage(): self
    {
        $instance = new self();
        $instance->name = 'blobsStorage';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function ffmpegPath(): self
    {
        $instance = new self();
        $instance->name = 'ffmpegPath';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function ffprobePath(): self
    {
        $instance = new self();
        $instance->name = 'ffprobePath';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function calculateMD5(): self
    {
        $instance = new self();
        $instance->name = 'calculateMD5';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function videoFileNamingAlgorithm(): self
    {
        $instance = new self();
        $instance->name = 'videoFileNamingAlgorithm';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function parallelTasks(): self
    {
        $instance = new self();
        $instance->name = 'parallelTasks';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function previewAudio(): self
    {
        $instance = new self();
        $instance->name = 'previewAudio';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function previewSegments(): self
    {
        $instance = new self();
        $instance->name = 'previewSegments';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function previewSegmentDuration(): self
    {
        $instance = new self();
        $instance->name = 'previewSegmentDuration';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function previewExcludeStart(): self
    {
        $instance = new self();
        $instance->name = 'previewExcludeStart';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function previewExcludeEnd(): self
    {
        $instance = new self();
        $instance->name = 'previewExcludeEnd';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function previewPreset(): self
    {
        $instance = new self();
        $instance->name = 'previewPreset';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function transcodeHardwareAcceleration(): self
    {
        $instance = new self();
        $instance->name = 'transcodeHardwareAcceleration';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function maxTranscodeSize(): self
    {
        $instance = new self();
        $instance->name = 'maxTranscodeSize';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function maxStreamingTranscodeSize(): self
    {
        $instance = new self();
        $instance->name = 'maxStreamingTranscodeSize';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function transcodeInputArgs(): self
    {
        $instance = new self();
        $instance->name = 'transcodeInputArgs';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function transcodeOutputArgs(): self
    {
        $instance = new self();
        $instance->name = 'transcodeOutputArgs';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function liveTranscodeInputArgs(): self
    {
        $instance = new self();
        $instance->name = 'liveTranscodeInputArgs';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function liveTranscodeOutputArgs(): self
    {
        $instance = new self();
        $instance->name = 'liveTranscodeOutputArgs';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function drawFunscriptHeatmapRange(): self
    {
        $instance = new self();
        $instance->name = 'drawFunscriptHeatmapRange';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function writeImageThumbnails(): self
    {
        $instance = new self();
        $instance->name = 'writeImageThumbnails';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function createImageClipsFromVideos(): self
    {
        $instance = new self();
        $instance->name = 'createImageClipsFromVideos';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function apiKey(): self
    {
        $instance = new self();
        $instance->name = 'apiKey';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function username(): self
    {
        $instance = new self();
        $instance->name = 'username';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function password(): self
    {
        $instance = new self();
        $instance->name = 'password';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function maxSessionAge(): self
    {
        $instance = new self();
        $instance->name = 'maxSessionAge';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function logFile(): self
    {
        $instance = new self();
        $instance->name = 'logFile';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function logOut(): self
    {
        $instance = new self();
        $instance->name = 'logOut';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function logLevel(): self
    {
        $instance = new self();
        $instance->name = 'logLevel';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function logAccess(): self
    {
        $instance = new self();
        $instance->name = 'logAccess';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function logFileMaxSize(): self
    {
        $instance = new self();
        $instance->name = 'logFileMaxSize';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function useCustomSpriteInterval(): self
    {
        $instance = new self();
        $instance->name = 'useCustomSpriteInterval';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function spriteInterval(): self
    {
        $instance = new self();
        $instance->name = 'spriteInterval';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function minimumSprites(): self
    {
        $instance = new self();
        $instance->name = 'minimumSprites';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function maximumSprites(): self
    {
        $instance = new self();
        $instance->name = 'maximumSprites';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function spriteScreenshotSize(): self
    {
        $instance = new self();
        $instance->name = 'spriteScreenshotSize';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function videoExtensions(): self
    {
        $instance = new self();
        $instance->name = 'videoExtensions';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function imageExtensions(): self
    {
        $instance = new self();
        $instance->name = 'imageExtensions';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function galleryExtensions(): self
    {
        $instance = new self();
        $instance->name = 'galleryExtensions';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function createGalleriesFromFolders(): self
    {
        $instance = new self();
        $instance->name = 'createGalleriesFromFolders';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function galleryCoverRegex(): self
    {
        $instance = new self();
        $instance->name = 'galleryCoverRegex';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function excludes(): self
    {
        $instance = new self();
        $instance->name = 'excludes';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function imageExcludes(): self
    {
        $instance = new self();
        $instance->name = 'imageExcludes';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function customPerformerImageLocation(): self
    {
        $instance = new self();
        $instance->name = 'customPerformerImageLocation';

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\StashBoxSelectionSet>
     */
    public static function stashBoxes(): self
    {
        $instance = new self();
        $instance->name = 'stashBoxes';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\StashBoxSelectionSet();

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function pythonPath(): self
    {
        $instance = new self();
        $instance->name = 'pythonPath';

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\PackageSourceSelectionSet>
     */
    public static function scraperPackageSources(): self
    {
        $instance = new self();
        $instance->name = 'scraperPackageSources';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\PackageSourceSelectionSet();

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\PackageSourceSelectionSet>
     */
    public static function pluginPackageSources(): self
    {
        $instance = new self();
        $instance->name = 'pluginPackageSources';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\PackageSourceSelectionSet();

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
