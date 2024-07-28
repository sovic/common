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
            $street .= '/' . $address->getOrientationNumber();
        }

        return $street;
    }

    public function formatCity(?AddressEntityInterface $address, ?bool $html = true): string
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
            $city .= $address->getZipCode();
            if ($address->getCountry()) {
                $city .= ', ' . $address->getCountry();
            }
        } elseif ($address->getCountry()) {
            $city .= $address->getCountry();
        }

        return $city;
    }
}
