<?php

namespace Sovic\Common\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class FileExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('format_display_file_name', $this->formatDisplayFileName(...)),
            new TwigFilter('format_file_size_readable', $this->formatFileSizeReadable(...)),
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
            return number_format($size / (1 << 30), 2) . ' GB';
        }
        if ((!$unit && $size >= 1 << 20) || $unit === 'MB') {
            return number_format($size / (1 << 20), 2) . ' MB';
        }
        if ((!$unit && $size >= 1 << 10) || $unit === 'KB') {
            return number_format($size / (1 << 10), 2) . ' KB';
        }

        return number_format($size) . ' bytes';
    }
}
