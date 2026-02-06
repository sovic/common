<?php

namespace Sovic\Common\DataList;

use Symfony\Component\HttpFoundation\Request;

final class BasicSearchRequestFactory extends AbstractSearchRequestFactory
{
    public function createFromRequest(Request $request): BasicSearchRequest
    {
        $searchRequest = new BasicSearchRequest();
        $this->loadDefaultSearchRequest($request, $searchRequest);

        return $searchRequest;
    }
}
