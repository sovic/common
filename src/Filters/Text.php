<?php

namespace Sovic\Common\Filters;

class Text
{
    public static function filterEmoji($text): string
    {
        // Match Emoticons
        $regexEmoticons = '/[\x{1F600}-\x{1F64F}]/u';
        $cleanText = preg_replace($regexEmoticons, '', $text);

        // Match Miscellaneous Symbols and Pictographs
        $regexSymbols = '/[\x{1F300}-\x{1F5FF}]/u';
        $cleanText = preg_replace($regexSymbols, '', $cleanText);

        // Match Transport And Map Symbols
        $regexTransport = '/[\x{1F680}-\x{1F6FF}]/u';
        $cleanText = preg_replace($regexTransport, '', $cleanText);

        // Match Miscellaneous Symbols
        $regexMisc = '/[\x{2600}-\x{26FF}]/u';
        $cleanText = preg_replace($regexMisc, '', $cleanText);

        // Match Dingbats
        $regexDingbats = '/[\x{2700}-\x{27BF}]/u';
        $cleanText = preg_replace($regexDingbats, '', $cleanText);

        // Match Flags
        $regexDingbats = '/[\x{1F1E6}-\x{1F1FF}]/u';
        $cleanText = preg_replace($regexDingbats, '', $cleanText);

        // Others
        $regexDingbats = '/[\x{1F910}-\x{1F95E}]/u';
        $cleanText = preg_replace($regexDingbats, '', $cleanText);

        $regexDingbats = '/[\x{1F980}-\x{1F991}]/u';
        $cleanText = preg_replace($regexDingbats, '', $cleanText);

        $regexDingbats = '/\x{1F9C0}/u';
        $cleanText = preg_replace($regexDingbats, '', $cleanText);

        $regexDingbats = '/\x{1F9F9}/u';
        $cleanText = preg_replace($regexDingbats, '', $cleanText);

        return trim($cleanText);
    }

    public static function prettyText(string $text, ?string $locale = null): string
    {
        $prepositions = [];
        $conjunctions = [];

        switch ($locale) {
            case 'cs':
                $prepositions1 = ['k', 'o', 's', 'v', 'u', 'z'];
                $prepositions2 = ['ve', 'na', 'od', 'do', 'ke', 'po', 'za', 'si'];
                $prepositions3 = ['pro', 'bez', 'pod', 'nad', 'při'];
                $prepositions4 = ['před', 'mezi', 'skrz'];
                $prepositions = array_merge($prepositions1, $prepositions2, $prepositions3, $prepositions4);
                $conjunctions = ['a', 'i', 'nebo', 'ani', 'ale', 'avšak', 'či', 'když', 'protože', 'aby', 'jestli'];
                break;
            case 'en':
                $prepositions = ['a', 'an', 'the', 'at', 'by', 'for', 'in', 'of', 'on', 'to', 'up', 'and', 'but', 'or', 'nor'];
                $conjunctions = ['as', 'after', 'although', 'because', 'before', 'if', 'since', 'though', 'unless', 'until', 'when', 'where', 'while'];
                break;
            default:
                break;
        }

        $search = array_merge($prepositions, $conjunctions);
        if (empty($search)) {
            return trim($text);
        }

        $searchRegex = '/ ([' . implode('|', $search) . ']) /';

        return trim(preg_replace($searchRegex, ' $1&nbsp;', $text));
    }

    /** @noinspection PhpRedundantOptionalArgumentInspection */
    public static function fixUtf8(string $value): string
    {
        $encoding = mb_detect_encoding($value, mb_detect_order(), false);
        if ($encoding === 'UTF-8') {
            $value = (string) mb_convert_encoding($value, 'UTF-8', 'UTF-8');
        }

        return iconv(mb_detect_encoding($value, mb_detect_order(), false), 'UTF-8//IGNORE', $value);
    }

    public static function filterNameCase(string $value, int $case = MB_CASE_TITLE): ?string
    {
        $value = trim($value);

        return mb_convert_case($value, $case, "UTF-8");
    }

    public static function removeSpaces(?string $value): ?string
    {
        if (empty($value)) {
            return null;
        }

        return trim(preg_replace("/\s+/", '', $value));
    }

    public static function removeMultipleSpaces(?string $value): ?string
    {
        if (empty($value)) {
            return null;
        }

        return trim(preg_replace("/\s+/", ' ', $value));
    }
}
