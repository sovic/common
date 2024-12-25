<?php

namespace Sovic\Common\Project;

use Sovic\Common\Entity\Setting;
use Sovic\Common\Enum\SettingTypeId;
use Sovic\Common\Model\EntityModelFactory;

final class SettingFactory extends EntityModelFactory
{
    public function create(
        SettingGroupId $groupId,
        string         $key,
        string         $value,
        SettingTypeId  $type = SettingTypeId::String,
        ?Project       $project = null,
        ?string        $description = null,
    ): Setting {
        $setting = new Setting();
        $setting->setGroupId($groupId);
        $setting->setKey($key);
        $setting->setValue($value);
        $setting->setType($type);
        if ($project) {
            $setting->setProject($project->entity);
        }
        $setting->setDescription($description);

        return $setting;
    }
}
