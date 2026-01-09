<?php

namespace Sovic\Common\Helpers;

use Collator;

class ArrayUtil
{
    public static function sortByKey(array &$array, string $key, ?string $locale = null): void
    {
        if ($locale) {
            $collator = new Collator($locale);
            uasort($array, static function ($a, $b) use ($collator, $key) {
                return $collator->compare($a[$key], $b[$key]);
            });
        } else {
            uasort($array, static function ($a, $b) use ($key) {
                return strcmp($a[$key], $b[$key]);
            });
        }
    }
}
