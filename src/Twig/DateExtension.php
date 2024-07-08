<?php

namespace Sovic\Common\Twig;

use DateTimeInterface;
use IntlDateFormatter;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class DateExtension extends AbstractExtension
{
    // https://unicode-org.github.io/icu/userguide/format_parse/datetime/#datetimepatterngenerator

    public function getFilters(): array
    {
        return [
            new TwigFilter('formatDate', $this->formatDate(...)),
            new TwigFilter('formatDateTime', $this->formatDateTime(...)),
            new TwigFilter('formatDateShortMonth', $this->formatDateShortMonth(...)),
            new TwigFilter('formatDateMonthName', $this->formatDateMonthName(...)),
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
        return $this->format($date, 'LLL');
    }

    public function formatDateMonthName(?DateTimeInterface $date): string
    {
        return $this->format($date, 'LLLL');
    }

    private function format(?DateTimeInterface $date, string $format): string
    {
        if (!$date) {
            return '';
        }

        // consider adding locale parameter, this uses system locale
        $formatter = new IntlDateFormatter('', IntlDateFormatter::FULL, IntlDateFormatter::FULL);
        $formatter->setPattern($format);

        return $formatter->format($date);
    }
}
