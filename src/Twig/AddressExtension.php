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
            new TwigFilter('formatStreet', $this->formatStreet(...)),
            new TwigFilter('formatCity', $this->formatCity(...)),
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

    public function formatCity(?AddressEntityInterface $address): string
    {
        if (!$address) {
            return '';
        }

        $city = $address->getCity();
        if ($address->getCityPart()) {
            $city .= ' (' . $address->getCityPart() . ')';
        }
        if ($address->getZipCode() || $address->getCountry()) {
            $city .= '<br>';
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
