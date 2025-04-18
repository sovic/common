<?php

namespace Sovic\Common\Enum;

enum ContactTypeId: string implements SimpleTranslatableEnumInterface
{
    // most common
    case Email = 'email';
    case Phone = 'phone';
    case Web = 'web';

    //
    case Fax = 'fax';

    // social networks
    case Facebook = 'facebook';
    case Instagram = 'instagram';
    case Threads = 'threads';
    case Twitter = 'twitter';

    public function trans(): string
    {
        return match ($this) {
            self::Email => 'Email',
            self::Phone => 'Telefon',
            self::Web => 'Web',
            //
            self::Fax => 'Fax',
            //
            self::Facebook => 'Facebook',
            self::Instagram => 'Instagram',
            self::Threads => 'Threads',
            self::Twitter => 'X',
        };
    }

    public function allowedDomains(): array
    {
        return match ($this) {
            self::Email, self::Fax, self::Web, self::Phone => ['*'],
            self::Facebook => ['www.facebook.com', 'facebook.com'],
            self::Instagram => ['www.instagram.com', 'instagram.com'],
            self::Threads => ['www.threads.net', 'threads.net'],
            self::Twitter => ['www.twitter.com', 'twitter.com'],
        };
    }
}
