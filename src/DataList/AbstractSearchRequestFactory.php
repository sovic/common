<?php

namespace Sovic\Common\DataList;

use Sovic\Common\DataList\Enum\VisibilityId;
use Symfony\Component\HttpFoundation\Request;

abstract class AbstractSearchRequestFactory
{
    public function loadDefaultSearchRequest(Request $request, SearchRequestInterface $searchRequest): void
    {
        $limit = (int) $request->query->get('limit', 25);
        if (!in_array($limit, [25, 50, 100])) {
            $limit = 25;
        }
        $searchRequest->setLimit($limit);

        $page = (int) $request->query->get('page', 1);
        $searchRequest->setPage($page);

        if ($request->query->has('visibility')) {
            $visibility = $request->query->get('visibility');
            $visibilityId = VisibilityId::tryFrom($visibility);
            if ($visibilityId) {
                $searchRequest->setVisibilityId($visibilityId);
            }
        }

        $search = $request->query->get('search');
        $search = $search ? trim($search) : null;
        $searchRequest->setSearch($search);

        $sort = $request->query->get('sort');
        if ($sort && in_array($sort, $searchRequest->getSortOptions(), true)) {
            $searchRequest->setSort($sort);
        }

        $sortOrder = $request->query->get('asc');
        if (in_array($sortOrder, ['asc', 'desc'], true)) {
            $searchRequest->setSortOrder($sortOrder);
        }
    }
}
