<?php

namespace Sovic\Common\Project;

enum SettingTypeId: string
{
    case String = 'string';
    case Integer = 'int';
    case Boolean = 'bool';
    case Array = 'array';
}
