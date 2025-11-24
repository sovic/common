<?php

namespace Sovic\Common\Project;

enum SettingGroupId: string
{
    case App = 'app';
    case External = 'external';
    case Gallery = 'gallery';
    case Mailer = 'mailer';
    case Routing = 'routing';
    case Security = 'security';
    case Theme = 'theme';

    public function trans(): string
    {
        return match ($this) {
            self::App => 'Aplikace',
            self::External => 'Externí služby',
            self::Gallery => 'Galerie',
            self::Mailer => 'Emaily',
            self::Routing => 'Routing',
            self::Security => 'Zabezpečení',
            self::Theme => 'Vzhled',
        };
    }
}
