<?php

namespace Sovic\Common\DataList;

use Sovic\Common\DataList\Enum\LayoutId;
use Sovic\Common\DataList\Enum\VisibilityId;
use Sovic\Common\Pagination\Pagination;

abstract class AbstractSearchRequest implements SearchRequestInterface
{
    public const DefaultLimit = 25;
    public const HardLimit = 1000;
    public const ResultWindow = 100000; // TODO project config

    private int $limit;
    private int $page = 1;
    private ?string $search = null;
    private VisibilityId $visibilityId = VisibilityId::Public;
    private ?string $sort = null;
    private ?string $sortOrder = null;
    private ?LayoutId $layoutId = null;
    private ?string $paginationRoute = null;
    private array $paginationRouteParams = [];

    protected function getDefaultLimit(): int
    {
        return self::DefaultLimit;
    }

    public function getLimit(): int
    {
        if (!isset($this->limit)) {
            $this->limit = $this->getDefaultLimit();
        }

        return $this->limit;
    }

    public function setLimit(int $limit): void
    {
        if ($limit < 1) {
            $limit = $this->getDefaultLimit();
        }
        if ($limit > self::HardLimit) {
            $limit = self::HardLimit;
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
        $maxPage = (int) ceil(self::ResultWindow / $this->getLimit());
        if ($page > $maxPage) {
            $page = $maxPage;
        }
        $this->page = $page;
    }

    public function getOffset(): int
    {
        if (!isset($this->page, $this->limit)) {
            return 0;
        }

        return ($this->getPage() - 1) * $this->getLimit();
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
        $pagination = new Pagination($total, $this->getLimit(), $this->getPage());
        if ($this->paginationRoute) {
            $pagination->setRoute($this->paginationRoute);
            $pagination->setRouteParams($this->paginationRouteParams);
        }

        return $pagination;
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
        if ($sort && !in_array($sort, $this->getSortOptions(), true)) {
            $sort = null;
        }
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

    public function setPaginationRoute(?string $routeName, array $params = []): void
    {
        $this->paginationRoute = $routeName;
        $this->paginationRouteParams = $params;
    }
}
