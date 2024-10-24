<?php

namespace Sovic\Common\DataList;

use Sovic\Common\DataList\Enum\LayoutId;
use Sovic\Common\DataList\Enum\VisibilityId;
use Sovic\Common\Pagination\Pagination;

abstract class AbstractSearchRequest implements SearchRequestInterface
{
    public const HARD_LIMIT = 1000;
    public const RESULT_WINDOW = 100000; // TODO project config

    private int $limit = 25;
    private int $page = 1;
    private ?string $search = null;
    private VisibilityId $visibilityId = VisibilityId::Public;
    private ?string $sort = null;
    private ?string $sortOrder = null;
    private ?LayoutId $layoutId = null;

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function setLimit(int $limit): void
    {
        if ($limit < 1) {
            $limit = 1;
        }
        if ($limit > self::HARD_LIMIT) {
            $limit = self::HARD_LIMIT;
        }
        $this->limit = $limit;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function setPage(int $page): void
    {
        if ($page < 1) {
            $page = 1;
        }
        $maxPage = (int) ceil(self::RESULT_WINDOW / $this->getLimit());
        if ($page > $maxPage) {
            $page = $maxPage;
        }
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

    public function getSortOptions(): array
    {
        return [];
    }

    public function getSort(): ?string
    {
        return $this->sort;
    }

    public function setSort(?string $sort): void
    {
        $this->sort = $sort;
    }

    public function getSortOrder(): ?string
    {
        return $this->sortOrder;
    }

    public function setSortOrder(?string $sortOrder): void
    {
        $this->sortOrder = $sortOrder;
    }

    public function getLayoutId(): ?LayoutId
    {
        return $this->layoutId;
    }

    public function setLayoutId(?LayoutId $layoutId): void
    {
        $this->layoutId = $layoutId;
    }

    public function toArray(): array
    {
        return [
            'layout' => $this->getLayoutId()->value ?? '',
            'limit' => $this->getLimit(),
            'order' => $this->getSortOrder() ?? '',
            'page' => $this->getPage(),
            'search' => $this->getSearch() ?? '',
            'sort' => $this->getSort() ?? '',
            'visibility' => $this->getVisibilityId()->value,
        ];
    }
}
