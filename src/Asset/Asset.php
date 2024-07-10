<?php

namespace Sovic\Common\Asset;

readonly class Asset
{
    public function __construct(
        private string $path,
        private string $package
    ) {
    }

    public function getPath(): string
    {
        return trim($this->path, '/\\ ');
    }

    public function getPackage(): string
    {
        return $this->package;
    }

    public function toArray(): array
    {
        return [
            'path' => $this->getPath(),
            'package' => $this->getPackage(),
        ];
    }
}
