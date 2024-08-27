<?php

namespace Sovic\Common\DataList;

use Sovic\Common\DataList\Enum\VisibilityId;

interface SearchRequestInterface
{
    public function getLimit(): int;

    public function getPage(): int;

    public function getSearch(): ?string;

    public function getVisibilityId(): VisibilityId;

    public function getSortOptions(): array;
}
