<?php

namespace Sovic\Common\Validator;

use InvalidArgumentException;
use Sovic\Common\Enum\CountryId;

class CompanyIdentificationNumberValidator
{
    public function validate(string $value, CountryId $countryId): bool
    {
        return match ($countryId) {
            CountryId::CZ => $this->validateCz($value),
            default => throw new InvalidArgumentException('Unsupported country ID'),
        };
    }

    /**
     * https://phpfashion.com/cs/jak-overit-platne-ic-a-rodne-cislo
     */
    private function validateCz(string $value): bool
    {
        // be liberal in what you receive
        $ic = preg_replace('#\s+#', '', $value);

        // is it the desired format?
        if (!preg_match('#^\d{8}$#', $ic)) {
            return false;
        }

        // checksum
        $a = 0;
        for ($i = 0; $i < 7; $i++) {
            $a += $ic[$i] * (8 - $i);
        }

        $a %= 11;
        if ($a === 0) {
            $c = 1;
        } elseif ($a === 1) {
            $c = 0;
        } else {
            $c = 11 - $a;
        }

        return (int) $ic[7] === $c;
    }
}
