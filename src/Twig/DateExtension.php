<?php

namespace Sovic\Common\Twig;

use DateTimeInterface;
use IntlDateFormatter;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class DateExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('formatDate', $this->formatDate(...)),
            new TwigFilter('formatDateTime', $this->formatDateTime(...)),
            new TwigFilter('formatDateShortMonth', $this->formatDateShortMonth(...)),
        ];
    }

    public function formatDate(?DateTimeInterface $date, string $format = 'j. n. Y'): string
    {
        return $date ? $date->format($format) : '';
    }

    public function formatDateTime(?DateTimeInterface $date, string $format = 'j. n. Y H:i'): string
    {
        return $date ? $date->format($format) : '';
    }

    public function formatDateShortMonth(?DateTimeInterface $date): string
    {
        if (!$date) {
            return '';
        }

        $formatter = new IntlDateFormatter('', IntlDateFormatter::FULL, IntlDateFormatter::FULL);
        $formatter->setPattern('LLL');

        return $formatter->format($date);
    }
}
