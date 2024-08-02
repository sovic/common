<?php

namespace Sovic\Common\DataList\Enum;

enum VisibilityId: string
{
    case All = 'all';
    case Public = 'public';
    case Private = 'private';
    case Deleted = 'deleted';
}
