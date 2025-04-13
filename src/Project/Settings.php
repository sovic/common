<?php

namespace Sovic\Common\Project;

use Doctrine\ORM\EntityManagerInterface;
use Sovic\Common\Entity\Setting;
use Sovic\Common\Enum\SettingTypeId;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class Settings
{
    private SettingsBag $settings;

    public function __construct(
        private readonly CacheInterface         $cache,
        private readonly EntityManagerInterface $em,
        private readonly int                    $ttl = 3600,
        private readonly ?Project               $project = null,
    ) {
        $key = 'settings';
        if ($this->project) {
            $key .= '.' . $this->project->entity->getSlug();
        }
        $settings = $this->cache->get($key, function (ItemInterface $cacheItem) {
            $cacheItem->expiresAfter($this->ttl);

            $criteria = [];
            if ($this->project) {
                $criteria['project'] = $this->project->entity;
            }

            $items = $this->em
                ->getRepository(Setting::class)
                ->findBy(
                    $criteria,
                    ['groupId' => 'ASC', 'key' => 'ASC']
                );

            return self::parseSettings($items);
        });

        $this->settings = new SettingsBag($settings['data'], $settings['template']);
    }

    public function all(): array
    {
        return $this->settings->all();
    }

    public function get(string $group, string $key, mixed $default = null): mixed
    {
        return $this->settings->get($group . '.' . $key, $default);
    }

    public function getTemplateData(): array
    {
        return $this->settings->getTemplateData();
    }

    /**
     * @param Setting[] $items
     */
    public static function parseSettings(array $items): array
    {
        $settings = [
            'data' => [],
            'template' => [],
        ];
        foreach ($items as $item) {
            $value = match ($item->getType()) {
                SettingTypeId::Array => explode("\n", trim($item->getValue())),
                SettingTypeId::Boolean => !empty($item->getValue()),
                SettingTypeId::Integer => (int) $item->getValue(),
                default => $item->getValue(),
            };

            $key = $item->getGroupId()->value . '.' . $item->getKey();
            $settings['data'][$key] = $value;
            if ($item->isTemplateEnabled()) {
                $settings['template'][$key] = $value;
            }
        }

        return $settings;
    }
}
