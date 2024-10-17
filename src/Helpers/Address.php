<?php

namespace Sovic\Common\Helpers;

use Sovic\Common\Entity\AddressEntityInterface;

class Address
{
    public static function formatStreet(?AddressEntityInterface $address): string
    {
        if (!$address) {
            return '';
        }

        $street = $address->getStreet();
        if ($address->getDescriptiveNumber()) {
            $street .= ' ' . $address->getDescriptiveNumber();
        }
        if ($address->getOrientationNumber()) {
            if ($address->getDescriptiveNumber()) {
                $street .= '/';
            } else {
                $street .= ' ';
            }

            $street .= $address->getOrientationNumber();
        }

        return $street;
    }

    public static function formatCity(?AddressEntityInterface $address, bool $html = true): string
    {
        if (!$address) {
            return '';
        }

        $city = $address->getCity();
        if ($address->getCityPart()) {
            $city .= ' (' . $address->getCityPart() . ')';
        }
        if ($address->getZipCode()) {
            $zipCode = $address->getZipCode();
            $join = $html ? '&nbsp;' : ' ';
            $city = substr($zipCode, 0, 3) . $join . substr($zipCode, 3, 2) . ' ' . $city;
        }
        if ($address->getCountry()) {
            if ($html) {
                $city .= '<br>';
            } else {
                $city .= ', ';
            }
            $city .= $address->getCountry()->trans();
        }

        return $city;
    }
}
