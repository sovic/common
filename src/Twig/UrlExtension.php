<?php

namespace Sovic\Common\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use VStelmakh\UrlHighlight\UrlHighlight;

class UrlExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('url_highlight', $this->urlHighlight(...)),
        ];
    }

    public static function urlHighlight(string $text): string
    {
        return (new UrlHighlight())->highlightUrls($text);
    }
}
