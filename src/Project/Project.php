<?php

namespace Sovic\Common\Project;

use Sovic\Common\Entity\Setting;
use Sovic\Common\Model\AbstractEntityModel;

/**
 * @property \Sovic\Common\Entity\Project entity
 */
class Project extends AbstractEntityModel
{
    private static ProjectSettings $settings;

    public function getId(): int
    {
        return $this->entity->getId();
    }

    public function getSlug(): string
    {
        return $this->entity->getSlug();
    }

    public function getSettings(): ProjectSettings
    {
        if (isset(self::$settings)) {
            return self::$settings;
        }

        $items = $this->entityManager
            ->getRepository(Setting::class)
            ->findBy(['project' => $this->entity]);
        $parameters = [];
        $templateKeys = [];
        foreach ($items as $item) {
            $parameters[$item->getGroupId()->value . '.' . $item->getKey()] = $item->getValue();
            if ($item->isTemplateEnabled()) {
                $templateKeys[$item->getGroupId() . '.' . $item->getKey()] = $item->getValue();
            }
        }

        self::$settings = new ProjectSettings($parameters, $templateKeys);

        return self::$settings;
    }
}
