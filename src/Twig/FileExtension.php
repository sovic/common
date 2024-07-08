<?php

namespace Sovic\Common\Twig;

use Twig\TwigFilter;

class FileExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('formatDisplayFileName', $this->formatDisplayFileName(...)),
            new TwigFilter('formatFileSizeReadable', $this->formatFileSizeReadable(...)),
        ];
    }

    public static function formatDisplayFileName(string $filename, string $extension = null): string
    {
        $filename = str_replace(['.', '_', '-'], ' ', $filename);

        return $extension ? $filename . ' (' . $extension . ')' : $filename;
    }

    public static function formatFileSizeReadable(int $size, string $unit = null): string
    {
        if ((!$unit && $size >= 1 << 30) || $unit === 'GB') {
            return number_format($size / (1 << 30), 2) . 'GB';
        }
        if ((!$unit && $size >= 1 << 20) || $unit === 'MB') {
            return number_format($size / (1 << 20), 2) . 'MB';
        }
        if ((!$unit && $size >= 1 << 10) || $unit === 'KB') {
            return number_format($size / (1 << 10), 2) . 'KB';
        }

        return number_format($size) . ' bytes';
    }
}
