<?php

namespace Sovic\Common\Controller\Trait;

use InvalidArgumentException;
use JetBrains\PhpStorm\NoReturn;

trait DownloadTrait
{
    /**
     * @param resource $stream
     */
    #[NoReturn]
    public function download($stream, string $fileName, ?int $fileSize = null): void
    {
        if (!is_resource($stream)) {
            throw new InvalidArgumentException('Invalid source');
        }

        header('Pragma: public');
        header('Expires: -1');
        header('Cache-Control: public, must-revalidate, post-check=0, pre-check=0');
        header('Content-Transfer-Encoding: binary');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        if ($fileSize) {
            header('Content-Length: ' . $fileSize);
        }
        header('Accept-Ranges: bytes');
        fpassthru($stream);

        exit;
    }

    public function downloadFile(string $path, string $fileName): void
    {
        if (!file_exists($path)) {
            throw new InvalidArgumentException('File not found');
        }

        $fileSize = filesize($path);
        $stream = fopen($path, 'rb');

        $this->download($stream, $fileName, $fileSize);
    }
}
