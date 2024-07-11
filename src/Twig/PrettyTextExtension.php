<?php

namespace Sovic\Common\Twig;

use Sovic\Common\Filters\Text;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class PrettyTextExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('pretty_text', $this->prettyText(...)),
        ];
    }

    public function prettyText(string $text, ?string $locale = null): string
    {
        return Text::prettyText($text, $locale);
    }
}
