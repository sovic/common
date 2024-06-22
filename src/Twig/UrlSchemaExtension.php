<?php

namespace Sovic\Common\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class UrlSchemaExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('url_schema', [$this, 'urlSchema']),
            new TwigFilter('url_schema_check', [$this, 'urlSchemaCheck']),
        ];
    }

    public function urlSchema(string $url): string
    {
        /** @noinspection HttpUrlsUsage */
        if (!str_starts_with($url, 'http://') && !str_starts_with($url, 'https://')) {
            $url = 'https://' . $url;
        }

        return $url;
    }

    public function urlSchemaCheck(string $url): string
    {
        /** @noinspection HttpUrlsUsage */
        if (!str_starts_with($url, 'http://') && !str_starts_with($url, 'https://')) {
            $url = 'https://' . $url;
        }
        if (str_starts_with($url, 'https://')) {
            $url = str_replace('https://', '', $url); // do not display https://
        } else {
            $url .= ' ⚠️';
        }

        return $url;
    }
}
