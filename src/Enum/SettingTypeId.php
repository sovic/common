<?php

namespace Sovic\Common\Enum;

enum SettingTypeId: string
{
    case String = 'string';
    case Integer = 'int';
    case Boolean = 'bool';
    case Array = 'array';
}
