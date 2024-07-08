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
            new TwigFilter('format_date', $this->formatDate(...)),
            new TwigFilter('format_date_time', $this->formatDateTime(...)),
            new TwigFilter('format_date_short_month', $this->formatDateShortMonth(...)),
            new TwigFilter('format_date_month_name', $this->formatDateMonthName(...)),
            new TwigFilter('format_readable_date', $this->formatReadableDate(...)),
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

    public function formatReadableDate(?DateTimeInterface $date, bool $includeDayName = false): string
    {
        if ($includeDayName) {
            return $this->format($date, 'EEEE d. MMMM y');
        }

        return $this->format($date, 'd. MMMM y');
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
