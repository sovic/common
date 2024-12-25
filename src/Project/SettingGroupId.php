<?php

namespace Sovic\Common\Project;

enum SettingGroupId: string
{
    case App = 'app';
    case Mailer = 'mailer';
    case Security = 'security';
}
