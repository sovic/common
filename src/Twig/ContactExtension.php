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

        $result = $this->parsePhoneNumber($value);

        $label = $value;
        $phone = $result['phone'];
        if (mb_strlen($phone) === 9) {
            $label = substr($result['phone'], 0, 3)
                . ' ' . substr($result['phone'], 3, 3)
                . ' ' . substr($result['phone'], 6, 3);
        }
        if ($result['code']) {
            $label = $result['code'] . ' ' . $label;
            $phone = $result['code'] . $phone;
        }

        return '<a href="tel:' . $phone . '">' . $label . '</a>';
    }

    private function parsePhoneNumber(string $phone): array
    {
        $code = null;
        if (str_starts_with($phone, '+420')) {
            $code = '+420';
            $phone = substr($phone, 4);
        }
        if (str_starts_with($phone, '+421')) {
            $code = '+421';
            $phone = substr($phone, 4);
        }
        $phone = str_replace([' '], [''], $phone);

        return compact('code', 'phone');
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
