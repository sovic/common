<?php

namespace Sovic\Common\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class ContactExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('format_contact_email', $this->formatContactEmail(...)),
            new TwigFilter('format_contact_facebook', $this->formatContactFacebook(...)),
            new TwigFilter('format_contact_phone', $this->formatContactPhone(...)),
            new TwigFilter('format_contact_web', $this->formatContactWeb(...)),
            new TwigFilter('fix_url_schema', $this->fixUrlSchema(...)),
        ];
    }

    public function formatContactEmail(?string $value): string
    {
        if (!$value) {
            return '';
        }

        return '<a href="mailto:' . $value . '">' . $value . '</a>';
    }

    public function formatContactFacebook(?string $value): string
    {
        if (!$value) {
            return '';
        }
        $url = $value;

        return '
            <a href="' . $url . '" target="_blank">' . $value . '</a>
            <i class="bi bi-arrow-up-right-square"></i>
        ';
    }

    public function formatContactPhone(?string $value): string
    {
        if (!$value) {
            return '';
        }

        return '<a href="tel:' . $value . '">' . $value . '</a>';
    }

    public function formatContactWeb(?string $value): string
    {
        if (!$value) {
            return '';
        }
        $url = $value;
        /** @noinspection HttpUrlsUsage */
        if (!str_starts_with($value, 'https://') && !str_starts_with($value, 'http://')) {
            $url = 'https://' . $value;
        }
        $value = preg_replace('/^https:\/\//', '', $value);

        $return = '
            <a href="' . $url . '" target="_blank">' . $value . '</a>
            <i class="bi bi-arrow-up-right-square"></i>
        ';
        /** @noinspection HttpUrlsUsage */
        if (str_starts_with($value, 'http://')) {
            $return = '<i class="bi bi-exclamation-triangle text-warning"></i>' . $return;
        }

        return $return;
    }

    public function fixUrlSchema(string $url): string
    {
        /** @noinspection HttpUrlsUsage */
        if (!str_starts_with($url, 'http://') && !str_starts_with($url, 'https://')) {
            $url = 'https://' . $url;
        }

        return $url;
    }
}
