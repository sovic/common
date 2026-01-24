<?php

namespace Sovic\Common\Helpers;

class StringUtil
{
    /** @noinspection PhpRedundantOptionalArgumentInspection */
    public static function fixUtf8(string $value): string
    {
        $encoding = mb_detect_encoding($value, mb_detect_order(), false);
        if ($encoding === 'UTF-8') {
            $value = mb_convert_encoding($value, 'UTF-8', 'UTF-8');
        }

        return iconv(mb_detect_encoding($value, mb_detect_order(), false), 'UTF-8//IGNORE', $value);
    }

    public static function toAscii(string $value, string $replacement = '_', array $allowed = ['/']): string
    {
        $value = trim($value);
        $a = [
            'á', 'ä', 'Ä', 'Á',
            'č', 'Ć', 'Č',
            'ď', 'Ď',
            'é', 'ě', 'ë', 'É', 'Ë',
            'í', 'Í',
            'ĺ', 'Ľ', 'Ĺ',
            'ň', 'Ň', 'Ń',
            'ó', 'ö', 'ô', 'Ö', 'Ó', 'Ô',
            'ř', 'ŕ', 'Ř', 'Ŕ',
            'š', 'ś', 'Š', 'Ś',
            'ť', 'Ť',
            'ú', 'ů', 'ü', 'Ú', 'Ü',
            'ý', 'Ý',
            'ž', 'ź', 'Ž', 'Ź'];
        $b = [
            'a', 'a', 'A', 'A',
            'c', 'C', 'C',
            'd', 'D',
            'e', 'e', 'e', 'E', 'E',
            'i', 'I',
            'l', 'L', 'L',
            'n', 'N', 'N',
            'o', 'o', 'o', 'O', 'O', 'O',
            'r', 'r', 'R', 'R',
            's', 's', 'S', 'S',
            't', 'T',
            'u', 'u', 'u', 'U', 'U',
            'y', 'Y',
            'z', 'z', 'Z', 'Z',
            'b', 'B', 'f', 'F', 'g', 'G', 'h', 'H', 'j', 'J', 'k', 'K', 'm', 'M', 'p', 'P', 'q', 'Q', 'v', 'V', 'w', 'W', 'x', 'X', 'y', 'Y', 'z', 'Z', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0', '_', '-', '.'];
        $b = array_merge($b, $allowed);

        $result = str_replace($a, $b, $value);
        $len = strlen($result);
        for ($i = 0; $i < $len; $i++) {
            if ($replacement && in_array($result[$i], $b, true) !== true) {
                $result[$i] = $replacement;
            }
        }

        return $result;
    }
}
