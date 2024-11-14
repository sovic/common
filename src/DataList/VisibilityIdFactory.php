<?php

namespace Sovic\Common\DataList;

use Sovic\Common\DataList\Enum\VisibilityId;
use Symfony\Component\HttpFoundation\Request;

final class VisibilityIdFactory
{
    public function loadFromRequest(Request $request): VisibilityId
    {
        $visibility = $request->query->get('visibility');
        if (!$visibility) {
            return VisibilityId::Public;
        }

        $visibilityId = VisibilityId::tryFrom($visibility);
        if (!$visibilityId) {
            $visibilityId = VisibilityId::Public;
        }

        return $visibilityId;
    }
}
