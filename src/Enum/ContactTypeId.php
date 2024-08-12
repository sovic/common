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
        };
    }

    public function allowedDomains(): array
    {
        return match ($this) {
            self::Email, self::Fax, self::Web, self::Phone => ['*'],
            self::Facebook => ['facebook.com'],
            self::Instagram => ['instagram.com'],
            self::Threads => ['threads.net'],
        };
    }
}
