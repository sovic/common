<?php

namespace Sovic\Common\Twig;

use Sovic\Common\Entity\AddressEntityInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AddressExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('format_street', $this->formatStreet(...)),
            new TwigFilter('format_city', $this->formatCity(...)),
            new TwigFilter('format_address', $this->formatAddress(...)),
        ];
    }

    public function formatStreet(?AddressEntityInterface $address): string
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
            }

            $street .= $address->getOrientationNumber();
        }

        return $street;
    }

    public function formatCity(?AddressEntityInterface $address, bool $html = true): string
    {
        if (!$address) {
            return '';
        }

        $city = $address->getCity();
        if ($address->getCityPart()) {
            $city .= ' (' . $address->getCityPart() . ')';
        }
        if ($address->getZipCode() || $address->getCountry()) {
            if ($html) {
                $city .= '<br>';
            } else {
                $city .= ', ';
            }
        }
        if ($address->getZipCode()) {
            $zipCode = $address->getZipCode();
            $join = $html ? '&nbsp;' : ' ';
            $city .= substr($zipCode, 0, 3) . $join . substr($zipCode, 3, 2);
            if ($address->getCountry()) {
                $city .= ', ' . $address->getCountry()->value;
            }
        } elseif ($address->getCountry()) {
            $city .= $address->getCountry()->value;
        }

        return $city;
    }

    public function formatAddress(?AddressEntityInterface $address, bool $html = true): string
    {
        if (!$address) {
            return '';
        }

        $parts = [];
        if ($html) {
            $parts[] = '<span class="address-street">' . $this->formatStreet($address) . '</span>';
            $parts[] = '<span class="address-city">' . $this->formatCity($address, $html) . '</span>';
        } else {
            $parts[] = $this->formatStreet($address);
            $parts[] = $this->formatCity($address, $html);
        }

        return implode($html ? '<br>' : ', ', $parts);
    }
}
