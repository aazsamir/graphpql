<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash;

class ConfigGeneralInput implements \Aazsamir\Graphpql\Model\GraphObject
{
    use \Aazsamir\Graphpql\Model\ToArray;

    /** @var array<\Tests\Feature\Fixture\Stash\StashConfigInput> */
    public ?array $stashes;
    public ?string $databasePath;
    public ?string $backupDirectoryPath;
    public ?string $deleteTrashPath;
    public ?string $generatedPath;
    public ?string $metadataPath;
    public ?string $scrapersPath;
    public ?string $pluginsPath;
    public ?string $cachePath;
    public ?string $blobsPath;
    public ?BlobsStorageType $blobsStorage;
    public ?string $ffmpegPath;
    public ?string $ffprobePath;
    public ?bool $calculateMD5;
    public ?HashAlgorithm $videoFileNamingAlgorithm;
    public ?int $parallelTasks;
    public ?bool $previewAudio;
    public ?int $previewSegments;
    public ?float $previewSegmentDuration;
    public ?string $previewExcludeStart;
    public ?string $previewExcludeEnd;
    public ?PreviewPreset $previewPreset;
    public ?bool $transcodeHardwareAcceleration;
    public ?StreamingResolutionEnum $maxTranscodeSize;
    public ?StreamingResolutionEnum $maxStreamingTranscodeSize;

    /** @var array<string> */
    public ?array $transcodeInputArgs;

    /** @var array<string> */
    public ?array $transcodeOutputArgs;

    /** @var array<string> */
    public ?array $liveTranscodeInputArgs;

    /** @var array<string> */
    public ?array $liveTranscodeOutputArgs;
    public ?bool $drawFunscriptHeatmapRange;
    public ?bool $writeImageThumbnails;
    public ?bool $createImageClipsFromVideos;
    public ?string $username;
    public ?string $password;
    public ?int $maxSessionAge;
    public ?string $logFile;
    public ?bool $logOut;
    public ?string $logLevel;
    public ?bool $logAccess;
    public ?int $logFileMaxSize;
    public ?bool $createGalleriesFromFolders;
    public ?string $galleryCoverRegex;

    /** @var array<string> */
    public ?array $videoExtensions;

    /** @var array<string> */
    public ?array $imageExtensions;

    /** @var array<string> */
    public ?array $galleryExtensions;

    /** @var array<string> */
    public ?array $excludes;

    /** @var array<string> */
    public ?array $imageExcludes;
    public ?string $customPerformerImageLocation;

    /** @var array<\Tests\Feature\Fixture\Stash\StashBoxInput> */
    public ?array $stashBoxes;
    public ?string $pythonPath;

    /** @var array<\Tests\Feature\Fixture\Stash\PackageSourceInput> */
    public ?array $scraperPackageSources;

    /** @var array<\Tests\Feature\Fixture\Stash\PackageSourceInput> */
    public ?array $pluginPackageSources;
    public ?int $spriteScreenshotSize;
    public ?bool $useCustomSpriteInterval;
    public ?float $spriteInterval;
    public ?int $minimumSprites;
    public ?int $maximumSprites;

    /**
     * @param array<\Tests\Feature\Fixture\Stash\StashConfigInput> $stashes
     * @param array<string> $transcodeInputArgs
     * @param array<string> $transcodeOutputArgs
     * @param array<string> $liveTranscodeInputArgs
     * @param array<string> $liveTranscodeOutputArgs
     * @param array<string> $videoExtensions
     * @param array<string> $imageExtensions
     * @param array<string> $galleryExtensions
     * @param array<string> $excludes
     * @param array<string> $imageExcludes
     * @param array<\Tests\Feature\Fixture\Stash\StashBoxInput> $stashBoxes
     * @param array<\Tests\Feature\Fixture\Stash\PackageSourceInput> $scraperPackageSources
     * @param array<\Tests\Feature\Fixture\Stash\PackageSourceInput> $pluginPackageSources
     */
    public static function new(
        ?array $stashes = null,
        ?string $databasePath = null,
        ?string $backupDirectoryPath = null,
        ?string $deleteTrashPath = null,
        ?string $generatedPath = null,
        ?string $metadataPath = null,
        ?string $scrapersPath = null,
        ?string $pluginsPath = null,
        ?string $cachePath = null,
        ?string $blobsPath = null,
        ?BlobsStorageType $blobsStorage = null,
        ?string $ffmpegPath = null,
        ?string $ffprobePath = null,
        ?bool $calculateMD5 = null,
        ?HashAlgorithm $videoFileNamingAlgorithm = null,
        ?int $parallelTasks = null,
        ?bool $previewAudio = null,
        ?int $previewSegments = null,
        ?float $previewSegmentDuration = null,
        ?string $previewExcludeStart = null,
        ?string $previewExcludeEnd = null,
        ?PreviewPreset $previewPreset = null,
        ?bool $transcodeHardwareAcceleration = null,
        ?StreamingResolutionEnum $maxTranscodeSize = null,
        ?StreamingResolutionEnum $maxStreamingTranscodeSize = null,
        ?array $transcodeInputArgs = null,
        ?array $transcodeOutputArgs = null,
        ?array $liveTranscodeInputArgs = null,
        ?array $liveTranscodeOutputArgs = null,
        ?bool $drawFunscriptHeatmapRange = null,
        ?bool $writeImageThumbnails = null,
        ?bool $createImageClipsFromVideos = null,
        ?string $username = null,
        ?string $password = null,
        ?int $maxSessionAge = null,
        ?string $logFile = null,
        ?bool $logOut = null,
        ?string $logLevel = null,
        ?bool $logAccess = null,
        ?int $logFileMaxSize = null,
        ?bool $createGalleriesFromFolders = null,
        ?string $galleryCoverRegex = null,
        ?array $videoExtensions = null,
        ?array $imageExtensions = null,
        ?array $galleryExtensions = null,
        ?array $excludes = null,
        ?array $imageExcludes = null,
        ?string $customPerformerImageLocation = null,
        ?array $stashBoxes = null,
        ?string $pythonPath = null,
        ?array $scraperPackageSources = null,
        ?array $pluginPackageSources = null,
        ?int $spriteScreenshotSize = null,
        ?bool $useCustomSpriteInterval = null,
        ?float $spriteInterval = null,
        ?int $minimumSprites = null,
        ?int $maximumSprites = null,
    ): self {
        $self = new self();
        $self->stashes = $stashes;
        $self->databasePath = $databasePath;
        $self->backupDirectoryPath = $backupDirectoryPath;
        $self->deleteTrashPath = $deleteTrashPath;
        $self->generatedPath = $generatedPath;
        $self->metadataPath = $metadataPath;
        $self->scrapersPath = $scrapersPath;
        $self->pluginsPath = $pluginsPath;
        $self->cachePath = $cachePath;
        $self->blobsPath = $blobsPath;
        $self->blobsStorage = $blobsStorage;
        $self->ffmpegPath = $ffmpegPath;
        $self->ffprobePath = $ffprobePath;
        $self->calculateMD5 = $calculateMD5;
        $self->videoFileNamingAlgorithm = $videoFileNamingAlgorithm;
        $self->parallelTasks = $parallelTasks;
        $self->previewAudio = $previewAudio;
        $self->previewSegments = $previewSegments;
        $self->previewSegmentDuration = $previewSegmentDuration;
        $self->previewExcludeStart = $previewExcludeStart;
        $self->previewExcludeEnd = $previewExcludeEnd;
        $self->previewPreset = $previewPreset;
        $self->transcodeHardwareAcceleration = $transcodeHardwareAcceleration;
        $self->maxTranscodeSize = $maxTranscodeSize;
        $self->maxStreamingTranscodeSize = $maxStreamingTranscodeSize;
        $self->transcodeInputArgs = $transcodeInputArgs;
        $self->transcodeOutputArgs = $transcodeOutputArgs;
        $self->liveTranscodeInputArgs = $liveTranscodeInputArgs;
        $self->liveTranscodeOutputArgs = $liveTranscodeOutputArgs;
        $self->drawFunscriptHeatmapRange = $drawFunscriptHeatmapRange;
        $self->writeImageThumbnails = $writeImageThumbnails;
        $self->createImageClipsFromVideos = $createImageClipsFromVideos;
        $self->username = $username;
        $self->password = $password;
        $self->maxSessionAge = $maxSessionAge;
        $self->logFile = $logFile;
        $self->logOut = $logOut;
        $self->logLevel = $logLevel;
        $self->logAccess = $logAccess;
        $self->logFileMaxSize = $logFileMaxSize;
        $self->createGalleriesFromFolders = $createGalleriesFromFolders;
        $self->galleryCoverRegex = $galleryCoverRegex;
        $self->videoExtensions = $videoExtensions;
        $self->imageExtensions = $imageExtensions;
        $self->galleryExtensions = $galleryExtensions;
        $self->excludes = $excludes;
        $self->imageExcludes = $imageExcludes;
        $self->customPerformerImageLocation = $customPerformerImageLocation;
        $self->stashBoxes = $stashBoxes;
        $self->pythonPath = $pythonPath;
        $self->scraperPackageSources = $scraperPackageSources;
        $self->pluginPackageSources = $pluginPackageSources;
        $self->spriteScreenshotSize = $spriteScreenshotSize;
        $self->useCustomSpriteInterval = $useCustomSpriteInterval;
        $self->spriteInterval = $spriteInterval;
        $self->minimumSprites = $minimumSprites;
        $self->maximumSprites = $maximumSprites;

        return $self;
    }

    public static function fromArray(array $data): self
    {
        $self = new self();
        if (array_key_exists('stashes', $data)) {
            $self->stashes = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\StashConfigInput::fromArray($data);
            }, $data['stashes'] ?? []);
        }
        if (array_key_exists('databasePath', $data)) {
            $self->databasePath = $data['databasePath'];
        }
        if (array_key_exists('backupDirectoryPath', $data)) {
            $self->backupDirectoryPath = $data['backupDirectoryPath'];
        }
        if (array_key_exists('deleteTrashPath', $data)) {
            $self->deleteTrashPath = $data['deleteTrashPath'];
        }
        if (array_key_exists('generatedPath', $data)) {
            $self->generatedPath = $data['generatedPath'];
        }
        if (array_key_exists('metadataPath', $data)) {
            $self->metadataPath = $data['metadataPath'];
        }
        if (array_key_exists('scrapersPath', $data)) {
            $self->scrapersPath = $data['scrapersPath'];
        }
        if (array_key_exists('pluginsPath', $data)) {
            $self->pluginsPath = $data['pluginsPath'];
        }
        if (array_key_exists('cachePath', $data)) {
            $self->cachePath = $data['cachePath'];
        }
        if (array_key_exists('blobsPath', $data)) {
            $self->blobsPath = $data['blobsPath'];
        }
        if (array_key_exists('blobsStorage', $data)) {
            $self->blobsStorage = \Tests\Feature\Fixture\Stash\BlobsStorageType::from($data['blobsStorage']);
        }
        if (array_key_exists('ffmpegPath', $data)) {
            $self->ffmpegPath = $data['ffmpegPath'];
        }
        if (array_key_exists('ffprobePath', $data)) {
            $self->ffprobePath = $data['ffprobePath'];
        }
        if (array_key_exists('calculateMD5', $data)) {
            $self->calculateMD5 = $data['calculateMD5'];
        }
        if (array_key_exists('videoFileNamingAlgorithm', $data)) {
            $self->videoFileNamingAlgorithm = \Tests\Feature\Fixture\Stash\HashAlgorithm::from($data['videoFileNamingAlgorithm']);
        }
        if (array_key_exists('parallelTasks', $data)) {
            $self->parallelTasks = $data['parallelTasks'];
        }
        if (array_key_exists('previewAudio', $data)) {
            $self->previewAudio = $data['previewAudio'];
        }
        if (array_key_exists('previewSegments', $data)) {
            $self->previewSegments = $data['previewSegments'];
        }
        if (array_key_exists('previewSegmentDuration', $data)) {
            $self->previewSegmentDuration = $data['previewSegmentDuration'];
        }
        if (array_key_exists('previewExcludeStart', $data)) {
            $self->previewExcludeStart = $data['previewExcludeStart'];
        }
        if (array_key_exists('previewExcludeEnd', $data)) {
            $self->previewExcludeEnd = $data['previewExcludeEnd'];
        }
        if (array_key_exists('previewPreset', $data)) {
            $self->previewPreset = \Tests\Feature\Fixture\Stash\PreviewPreset::from($data['previewPreset']);
        }
        if (array_key_exists('transcodeHardwareAcceleration', $data)) {
            $self->transcodeHardwareAcceleration = $data['transcodeHardwareAcceleration'];
        }
        if (array_key_exists('maxTranscodeSize', $data)) {
            $self->maxTranscodeSize = \Tests\Feature\Fixture\Stash\StreamingResolutionEnum::from($data['maxTranscodeSize']);
        }
        if (array_key_exists('maxStreamingTranscodeSize', $data)) {
            $self->maxStreamingTranscodeSize = \Tests\Feature\Fixture\Stash\StreamingResolutionEnum::from($data['maxStreamingTranscodeSize']);
        }
        if (array_key_exists('transcodeInputArgs', $data)) {
            $self->transcodeInputArgs = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['transcodeInputArgs'] ?? []);
        }
        if (array_key_exists('transcodeOutputArgs', $data)) {
            $self->transcodeOutputArgs = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['transcodeOutputArgs'] ?? []);
        }
        if (array_key_exists('liveTranscodeInputArgs', $data)) {
            $self->liveTranscodeInputArgs = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['liveTranscodeInputArgs'] ?? []);
        }
        if (array_key_exists('liveTranscodeOutputArgs', $data)) {
            $self->liveTranscodeOutputArgs = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['liveTranscodeOutputArgs'] ?? []);
        }
        if (array_key_exists('drawFunscriptHeatmapRange', $data)) {
            $self->drawFunscriptHeatmapRange = $data['drawFunscriptHeatmapRange'];
        }
        if (array_key_exists('writeImageThumbnails', $data)) {
            $self->writeImageThumbnails = $data['writeImageThumbnails'];
        }
        if (array_key_exists('createImageClipsFromVideos', $data)) {
            $self->createImageClipsFromVideos = $data['createImageClipsFromVideos'];
        }
        if (array_key_exists('username', $data)) {
            $self->username = $data['username'];
        }
        if (array_key_exists('password', $data)) {
            $self->password = $data['password'];
        }
        if (array_key_exists('maxSessionAge', $data)) {
            $self->maxSessionAge = $data['maxSessionAge'];
        }
        if (array_key_exists('logFile', $data)) {
            $self->logFile = $data['logFile'];
        }
        if (array_key_exists('logOut', $data)) {
            $self->logOut = $data['logOut'];
        }
        if (array_key_exists('logLevel', $data)) {
            $self->logLevel = $data['logLevel'];
        }
        if (array_key_exists('logAccess', $data)) {
            $self->logAccess = $data['logAccess'];
        }
        if (array_key_exists('logFileMaxSize', $data)) {
            $self->logFileMaxSize = $data['logFileMaxSize'];
        }
        if (array_key_exists('createGalleriesFromFolders', $data)) {
            $self->createGalleriesFromFolders = $data['createGalleriesFromFolders'];
        }
        if (array_key_exists('galleryCoverRegex', $data)) {
            $self->galleryCoverRegex = $data['galleryCoverRegex'];
        }
        if (array_key_exists('videoExtensions', $data)) {
            $self->videoExtensions = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['videoExtensions'] ?? []);
        }
        if (array_key_exists('imageExtensions', $data)) {
            $self->imageExtensions = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['imageExtensions'] ?? []);
        }
        if (array_key_exists('galleryExtensions', $data)) {
            $self->galleryExtensions = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['galleryExtensions'] ?? []);
        }
        if (array_key_exists('excludes', $data)) {
            $self->excludes = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['excludes'] ?? []);
        }
        if (array_key_exists('imageExcludes', $data)) {
            $self->imageExcludes = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return $data;
            }, $data['imageExcludes'] ?? []);
        }
        if (array_key_exists('customPerformerImageLocation', $data)) {
            $self->customPerformerImageLocation = $data['customPerformerImageLocation'];
        }
        if (array_key_exists('stashBoxes', $data)) {
            $self->stashBoxes = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\StashBoxInput::fromArray($data);
            }, $data['stashBoxes'] ?? []);
        }
        if (array_key_exists('pythonPath', $data)) {
            $self->pythonPath = $data['pythonPath'];
        }
        if (array_key_exists('scraperPackageSources', $data)) {
            $self->scraperPackageSources = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\PackageSourceInput::fromArray($data);
            }, $data['scraperPackageSources'] ?? []);
        }
        if (array_key_exists('pluginPackageSources', $data)) {
            $self->pluginPackageSources = array_map(function ($data) {
                if ($data === []) {
                    return [];
                }

                return \Tests\Feature\Fixture\Stash\PackageSourceInput::fromArray($data);
            }, $data['pluginPackageSources'] ?? []);
        }
        if (array_key_exists('spriteScreenshotSize', $data)) {
            $self->spriteScreenshotSize = $data['spriteScreenshotSize'];
        }
        if (array_key_exists('useCustomSpriteInterval', $data)) {
            $self->useCustomSpriteInterval = $data['useCustomSpriteInterval'];
        }
        if (array_key_exists('spriteInterval', $data)) {
            $self->spriteInterval = $data['spriteInterval'];
        }
        if (array_key_exists('minimumSprites', $data)) {
            $self->minimumSprites = $data['minimumSprites'];
        }
        if (array_key_exists('maximumSprites', $data)) {
            $self->maximumSprites = $data['maximumSprites'];
        }

        return $self;
    }
}
