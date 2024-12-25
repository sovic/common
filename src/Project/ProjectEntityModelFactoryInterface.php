<?php

namespace Sovic\Common\Project;

interface ProjectEntityModelFactoryInterface
{
    public function setProject(?Project $project): void;

    public function getProjectSelectCriteria(): array;
}
