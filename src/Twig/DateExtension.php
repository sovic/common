<?php

namespace Sovic\Common\Twig;

use DateTimeInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class DateExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('formatDate', $this->formatDate(...)),
            new TwigFilter('formatDateTime', $this->formatDateTime(...)),
        ];
    }

    public function formatDate(?DateTimeInterface $date): string
    {
        return $date ? $date->format('j. n. Y') : '';
    }

    public function formatDateTime(?DateTimeInterface $date): string
    {
        return $date ? $date->format('j. n. Y H:i') : '';
    }
}
