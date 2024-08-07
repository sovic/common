<?php

namespace Sovic\Common\Validation;

use InvalidArgumentException;
use Sovic\Common\Enum\CountryId;

class PersonalIdentificationNumberValidator
{
    public function validate(string $value, CountryId $countryId): bool
    {
        if ($countryId === CountryId::CZ || $countryId === CountryId::SK) {
            return $this->validateCzSk($value);
        }

        throw new InvalidArgumentException('Unsupported country ID');
    }

    /**
     * CZ, SK rodné číslo
     *
     * https://phpfashion.com/cs/jak-overit-platne-ic-a-rodne-cislo
     */
    private function validateCzSk(string $value): bool
    {
        // be liberal in what you receive
        if (!preg_match('#^\s*(\d\d)(\d\d)(\d\d)[ /]*(\d\d\d)(\d?)\s*$#', $value, $matches)) {
            return false;
        }

        [, $year, $month, $day, $ext, $c] = $matches;

        if ($c === '') {
            $year += $year < 54 ? 1900 : 1800;
        } else {
            // checksum
            $mod = ($year . $month . $day . $ext) % 11;
            if ($mod === 10) {
                $mod = 0;
            }
            if ($mod !== (int) $c) {
                return false;
            }

            $year += $year < 54 ? 2000 : 1900;
        }

        // 20, 50 or 70 can be added to the month
        if ($month > 70 && $year > 2003) {
            $month -= 70;
        } elseif ($month > 50) {
            $month -= 50;
        } elseif ($month > 20 && $year > 2003) {
            $month -= 20;
        }

        // data check
        if (!checkdate($month, $day, $year)) {
            return false;
        }

        return true;
    }
}
