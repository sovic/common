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
}
