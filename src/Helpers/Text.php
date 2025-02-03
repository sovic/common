<?php

namespace Sovic\Common\Helpers;

class Text
{
    public static function isUppercasePrevailing(string $string, int $threshold = 50): bool
    {
        // convert utf-8 to ascii
        $string = iconv('utf-8', 'ascii//TRANSLIT', $string);

        // has more uppercase letters than lowercase letters
        $uppercaseCount = preg_match_all('/[A-Z]/', $string);
        $lowercaseCount = preg_match_all('/[a-z]/', $string);

        return $uppercaseCount >= $lowercaseCount && $uppercaseCount / strlen($string) * 100 >= $threshold;
    }
}
