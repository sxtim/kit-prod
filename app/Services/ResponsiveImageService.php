<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Orchid\Attachment\Models\Attachment;
use RuntimeException;

class ResponsiveImageService
{
    public const VARIANT_MOBILE = 'mobile';
    public const VARIANT_DESKTOP = 'desktop';

    private const WEBP_QUALITY = 90;

    private const VARIANTS = [
        self::VARIANT_MOBILE => 1280,
        self::VARIANT_DESKTOP => 1920,
    ];

    public function generateCopies(string $source, bool $force = false): array
    {
        $resolved = $this->resolveSource($source);

        if ($resolved === null || $this->isGeneratedVariant($resolved['path'])) {
            return [];
        }

        return $this->generateResolvedCopies($resolved, $force);
    }

    public function generateCopiesForAttachment(Attachment $attachment, bool $force = false): array
    {
        $path = $attachment->physicalPath();

        if (!$path || $this->isGeneratedVariant($path) || !str_starts_with((string) $attachment->mime, 'image/')) {
            return [];
        }

        $disk = Storage::disk($attachment->disk);

        if (!$disk->exists($path)) {
            return [];
        }

        $sourcePath = $disk->path($path);

        return $this->generateResolvedCopies([
            'filesystem_path' => $sourcePath,
            'path' => $path,
            'url_prefix' => rtrim((string) dirname($attachment->url() ?: Storage::url($path)), '/\\'),
        ], $force);
    }

    public function safelyGenerateCopiesForAttachment(Attachment $attachment): void
    {
        try {
            $this->generateCopiesForAttachment($attachment);
        } catch (\Throwable $exception) {
            Log::warning('Responsive image generation failed', [
                'attachment_id' => $attachment->id,
                'path' => $attachment->physicalPath(),
                'message' => $exception->getMessage(),
            ]);
        }
    }

    public function getVariantUrl(?string $source, string $variant): ?string
    {
        if (!$source || !isset(self::VARIANTS[$variant])) {
            return null;
        }

        $resolved = $this->resolveSource($source);

        if ($resolved === null) {
            return null;
        }

        $variantPath = $this->variantFilesystemPath($resolved['filesystem_path'], $variant);

        if (!is_file($variantPath)) {
            return null;
        }

        return $this->variantUrl($resolved, $variant);
    }

    public function getExistingVariants(?string $source): array
    {
        $variants = [];

        foreach (array_keys(self::VARIANTS) as $variant) {
            $url = $this->getVariantUrl($source, $variant);

            if ($url) {
                $variants[$variant] = $url;
            }
        }

        return $variants;
    }

    public function isSupportedImagePath(string $path): bool
    {
        return preg_match('/\.(jpe?g|png|gif|webp)$/i', $path) === 1;
    }

    public function shouldSkipPublicPath(string $path): bool
    {
        $normalized = str_replace('\\', '/', $path);

        return str_contains($normalized, '/public/assets/img/foto-striyki-june/')
            || str_ends_with($normalized, '/public/assets/img/logo/sz-cube-logo.jpg')
            || $this->isGeneratedVariant($normalized);
    }

    private function generateResolvedCopies(array $resolved, bool $force): array
    {
        $sourcePath = $resolved['filesystem_path'];

        if (!is_file($sourcePath) || !$this->isSupportedImagePath($sourcePath)) {
            return [];
        }

        $imageSize = @getimagesize($sourcePath);

        if (!$imageSize) {
            return [];
        }

        [$sourceWidth, $sourceHeight] = $imageSize;
        $mime = $imageSize['mime'] ?? '';
        $generated = [];

        foreach (self::VARIANTS as $variant => $targetWidth) {
            $destinationPath = $this->variantFilesystemPath($sourcePath, $variant);

            if (!$force && is_file($destinationPath) && filemtime($destinationPath) >= filemtime($sourcePath)) {
                $generated[$variant] = $destinationPath;
                continue;
            }

            $newWidth = min($sourceWidth, $targetWidth);
            $newHeight = (int) round($sourceHeight * ($newWidth / $sourceWidth));
            $sourceImage = $this->createImageResource($sourcePath, $mime);
            $resizedImage = imagecreatetruecolor($newWidth, $newHeight);

            imagealphablending($resizedImage, false);
            imagesavealpha($resizedImage, true);

            imagecopyresampled(
                $resizedImage,
                $sourceImage,
                0,
                0,
                0,
                0,
                $newWidth,
                $newHeight,
                $sourceWidth,
                $sourceHeight
            );

            $temporaryPath = $destinationPath . '.tmp';

            if (!imagewebp($resizedImage, $temporaryPath, self::WEBP_QUALITY)) {
                imagedestroy($sourceImage);
                imagedestroy($resizedImage);

                throw new RuntimeException('Cannot write WebP variant: ' . $destinationPath);
            }

            imagedestroy($sourceImage);
            imagedestroy($resizedImage);

            rename($temporaryPath, $destinationPath);
            $generated[$variant] = $destinationPath;
        }

        return $generated;
    }

    private function createImageResource(string $path, string $mime)
    {
        return match ($mime) {
            'image/jpeg' => imagecreatefromjpeg($path),
            'image/png' => imagecreatefrompng($path),
            'image/gif' => imagecreatefromgif($path),
            'image/webp' => imagecreatefromwebp($path),
            default => throw new RuntimeException('Unsupported image type: ' . $mime),
        };
    }

    private function resolveSource(string $source): ?array
    {
        $parts = parse_url($source);
        $path = $parts['path'] ?? $source;

        if (!$path || $this->isGeneratedVariant($path)) {
            return null;
        }

        $path = '/' . ltrim($path, '/');

        if (str_starts_with($path, '/assets/') || str_starts_with($path, '/storage/')) {
            $filesystemPath = public_path(ltrim($path, '/'));

            if (!is_file($filesystemPath)) {
                return null;
            }

            return [
                'filesystem_path' => $filesystemPath,
                'path' => $path,
                'url_prefix' => $this->sourceUrlPrefix($source, $path),
            ];
        }

        if (!str_starts_with($path, '/')) {
            $filesystemPath = public_path($path);

            if (is_file($filesystemPath)) {
                return [
                    'filesystem_path' => $filesystemPath,
                    'path' => '/' . $path,
                    'url_prefix' => dirname('/' . $path),
                ];
            }
        }

        return null;
    }

    private function sourceUrlPrefix(string $source, string $path): string
    {
        if (filter_var($source, FILTER_VALIDATE_URL)) {
            $parts = parse_url($source);
            $origin = ($parts['scheme'] ?? 'https') . '://' . ($parts['host'] ?? '');

            if (isset($parts['port'])) {
                $origin .= ':' . $parts['port'];
            }

            return rtrim($origin . '/' . trim(dirname($path), '/.'), '/');
        }

        return rtrim(dirname($path), '/\\');
    }

    private function variantFilesystemPath(string $sourcePath, string $variant): string
    {
        $info = pathinfo($sourcePath);

        return $info['dirname'] . '/' . $info['filename'] . '-' . $variant . '.webp';
    }

    private function variantUrl(array $resolved, string $variant): string
    {
        $info = pathinfo($resolved['path']);

        return rtrim($resolved['url_prefix'], '/') . '/' . $info['filename'] . '-' . $variant . '.webp';
    }

    private function isGeneratedVariant(string $path): bool
    {
        return preg_match('/-(mobile|desktop)\.webp$/i', $path) === 1;
    }
}
