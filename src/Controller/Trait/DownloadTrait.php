<?php

namespace Sovic\Common\Controller\Trait;

use InvalidArgumentException;
use JetBrains\PhpStorm\NoReturn;

trait DownloadTrait
{
    #[NoReturn]
    public function download(string $path, string $fileName): void
    {
        if (!file_exists($path)) {
            throw new InvalidArgumentException('File not found');
        }

        $stream = fopen($path, 'rb');
        $fileSize = filesize($path);

        header('Pragma: public');
        header('Expires: -1');
        header('Cache-Control: public, must-revalidate, post-check=0, pre-check=0');
        header('Content-Transfer-Encoding: binary');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Content-Length: ' . $fileSize);
        header('Accept-Ranges: bytes');
        fpassthru($stream);

        exit;
    }
}
