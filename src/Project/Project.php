<?php

namespace Sovic\Common\Project;

use Sovic\Common\Entity\Setting;
use Sovic\Common\Model\AbstractEntityModel;

/**
 * @property \Sovic\Common\Entity\Project entity
 */
class Project extends AbstractEntityModel
{
    private static SettingsBag $settings;

    public function getId(): int
    {
        return $this->entity->getId();
    }

    public function getSlug(): string
    {
        return $this->entity->getSlug();
    }

    public function getSettings(): SettingsBag
    {
        if (isset(self::$settings)) {
            return self::$settings;
        }

        $items = $this->entityManager
            ->getRepository(Setting::class)
            ->findBy(['project' => $this->entity]);
        $settings = Settings::parseSettings($items);

        self::$settings = new SettingsBag($settings['data'], $settings['template']);

        return self::$settings;
    }
}
