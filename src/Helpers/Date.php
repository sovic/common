<?php

namespace Sovic\Common\Helpers;

use DateTime;
use IntlDateFormatter;
use JetBrains\PhpStorm\ArrayShape;

class Date
{
    #[ArrayShape(['month' => "string", 'year' => "string", 'title' => "string"])]
    public static function lastMonths(int $count, ?string $locale = null): array
    {
        $date = new DateTime();
        $res = [];
        for ($i = 0; $i < $count; $i++) {
            $month = $date->format('m');
            $year = $date->format('Y');
            $res[] = [
                'month' => (int) $month,
                'year' => (int) $year,
                'title' => $month . '-' . $year,
                'active' => false,
            ];

            $locale = $locale ?: '';
            $formatter = new IntlDateFormatter($locale, IntlDateFormatter::FULL, IntlDateFormatter::FULL);
            $formatter->setPattern('LLLL y');
            $res[$i]['title'] = $formatter->format($date);

            $date->modify('-1 month');
        }

        return $res;
    }
}
