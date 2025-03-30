<?php

namespace Sovic\Common\Project;

use Sovic\Common\Model\AbstractEntityModel;

/**
 * @property \Sovic\Common\Entity\Project entity
 */
class Project extends AbstractEntityModel
{
    public function getId(): int
    {
        return $this->entity->getId();
    }

    public function getSlug(): string
    {
        return $this->entity->getSlug();
    }
}
