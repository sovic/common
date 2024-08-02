<?php

namespace Sovic\Common\DataList;

use Sovic\Common\DataList\Enum\VisibilityId;
use Sovic\Common\Pagination\Pagination;

abstract class AbstractSearchRequest implements SearchRequestInterface
{
    public const HARD_LIMIT = 100;

    private int $limit = 25;
    private int $page = 1;
    private ?string $search = null;
    private VisibilityId $visibilityId = VisibilityId::Public;

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function setLimit(int $limit): void
    {
        $this->limit = $limit;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function setPage(int $page): void
    {
        $this->page = $page;
    }

    public function getSearch(): ?string
    {
        return $this->search;
    }

    public function setSearch(?string $search): void
    {
        $this->search = $search;
    }

    public function getVisibilityId(): VisibilityId
    {
        return $this->visibilityId;
    }

    public function setVisibilityId(VisibilityId $visibilityId): void
    {
        $this->visibilityId = $visibilityId;
    }

    public function getPagination(int $total): Pagination
    {
        return new Pagination($total, $this->getLimit(), $this->getPage());
    }

    public function toArray(): array
    {
        return [
            'limit' => $this->getLimit(),
            'page' => $this->getPage(),
            'search' => $this->getSearch() ?? '',
            'visibility_id' => $this->getVisibilityId()->value,
        ];
    }
}
