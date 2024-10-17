<?php

namespace Sovic\Common\Twig;

use Sovic\Common\Entity\AddressEntityInterface;
use Sovic\Common\Helpers\Address;
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
        return Address::formatStreet($address);
    }

    public function formatCity(?AddressEntityInterface $address, bool $html = true): string
    {
        return Address::formatCity($address, $html);
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
