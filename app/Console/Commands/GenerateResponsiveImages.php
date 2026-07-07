<?php

namespace App\Console\Commands;

use App\Services\ResponsiveImageService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Orchid\Attachment\Models\Attachment;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;

class GenerateResponsiveImages extends Command
{
    protected $signature = 'images:generate-responsive
        {--force : Regenerate existing WebP variants}
        {--public : Process public/assets/img files}
        {--storage : Process Orchid uploaded image attachments}
        {--path=* : Limit processing by path prefix or fragment}
        {--limit=0 : Stop after this many source images}
        {--min-kb=80 : Skip source files smaller than this size}';

    protected $description = 'Generate mobile and desktop WebP variants for public and uploaded images';

    public function handle(ResponsiveImageService $images): int
    {
        $force = (bool) $this->option('force');
        $processPublic = (bool) $this->option('public');
        $processStorage = (bool) $this->option('storage');
        $limit = (int) $this->option('limit');
        $minBytes = max(0, (int) $this->option('min-kb')) * 1024;

        if (!$processPublic && !$processStorage) {
            $processPublic = true;
            $processStorage = true;
        }

        $processed = 0;
        $failed = 0;

        if ($processPublic) {
            [$publicProcessed, $publicFailed] = $this->processPublicImages($images, $force, $limit, $processed, $minBytes);
            $processed += $publicProcessed;
            $failed += $publicFailed;
        }

        if ($processStorage && ($limit <= 0 || $processed < $limit)) {
            [$storageProcessed, $storageFailed] = $this->processStorageImages($images, $force, $limit, $processed, $minBytes);
            $processed += $storageProcessed;
            $failed += $storageFailed;
        }

        $this->info("Processed: {$processed}. Failed: {$failed}.");

        return $failed > 0 ? self::FAILURE : self::SUCCESS;
    }

    private function processPublicImages(ResponsiveImageService $images, bool $force, int $limit, int $alreadyProcessed, int $minBytes): array
    {
        $directory = public_path('assets/img');

        if (!is_dir($directory)) {
            return [0, 0];
        }

        $processed = 0;
        $failed = 0;
        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory, RecursiveDirectoryIterator::SKIP_DOTS));

        /** @var SplFileInfo $file */
        foreach ($iterator as $file) {
            if ($limit > 0 && $alreadyProcessed + $processed >= $limit) {
                break;
            }

            $path = $file->getPathname();

            if (!$file->isFile()
                || !$images->isSupportedImagePath($path)
                || $images->shouldSkipPublicPath($path)
                || $file->getSize() < $minBytes
                || !$this->matchesPathFilter($path)
            ) {
                continue;
            }

            try {
                $generated = $images->generateCopies('/' . ltrim(str_replace(public_path(), '', $path), '/'), $force);

                if ($generated === []) {
                    continue;
                }

                $processed++;
                $this->line('Generated public image variants: ' . str_replace(base_path() . '/', '', $path));
            } catch (\Throwable $exception) {
                $failed++;
                $this->warn('Failed public image ' . $path . ': ' . $exception->getMessage());
            }
        }

        return [$processed, $failed];
    }

    private function processStorageImages(ResponsiveImageService $images, bool $force, int $limit, int $alreadyProcessed, int $minBytes): array
    {
        if (!Schema::hasTable('attachments')) {
            return [0, 0];
        }

        $processed = 0;
        $failed = 0;
        $seen = [];

        Attachment::query()
            ->where('mime', 'like', 'image/%')
            ->orderBy('id')
            ->cursor()
            ->each(function (Attachment $attachment) use ($images, $force, $limit, $alreadyProcessed, $minBytes, &$processed, &$failed, &$seen) {
                if ($limit > 0 && $alreadyProcessed + $processed >= $limit) {
                    return false;
                }

                $path = $attachment->physicalPath();
                $key = $attachment->disk . ':' . $path;

                if (!$path || isset($seen[$key]) || !$this->matchesPathFilter($path) || $attachment->size < $minBytes) {
                    return null;
                }

                $seen[$key] = true;

                try {
                    $generated = $images->generateCopiesForAttachment($attachment, $force);

                    if ($generated === []) {
                        return null;
                    }

                    $processed++;
                    $this->line('Generated upload image variants: attachment #' . $attachment->id . ' ' . $path);
                } catch (\Throwable $exception) {
                    $failed++;
                    $this->warn('Failed attachment #' . $attachment->id . ': ' . $exception->getMessage());
                }

                return null;
            });

        return [$processed, $failed];
    }

    private function matchesPathFilter(string $path): bool
    {
        $filters = array_filter((array) $this->option('path'));

        if ($filters === []) {
            return true;
        }

        foreach ($filters as $filter) {
            if (str_contains(str_replace('\\', '/', $path), trim(str_replace('\\', '/', $filter), '/'))) {
                return true;
            }
        }

        return false;
    }
}
