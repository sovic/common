<?php

namespace Sovic\Common\DataList;

final class BasicSearchRequest extends AbstractSearchRequest
{
    public function toArray(): array
    {
        return [
            'limit' => $this->getLimit(),
            'page' => $this->getPage(),
            'search' => $this->getSearch(),
        ];
    }
}
