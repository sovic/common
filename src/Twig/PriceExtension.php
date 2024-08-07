<?php

namespace Sovic\Common\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class PriceExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('format_price', $this->formatPrice(...)),
        ];
    }

    public function formatPrice(string $price): string
    {
        return $price . ' Kč'; // TODO
    }
}
