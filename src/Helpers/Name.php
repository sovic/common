<?php

namespace Sovic\Common\Helpers;

use Sovic\Common\Entity\NameEntityInterface;

class Name
{
    public static function formatName(NameEntityInterface $entity): string
    {
        $name = $entity->getName() . ' ' . $entity->getSurname();

        if ($entity->getTitleBefore()) {
            $name = $entity->getTitleBefore() . ' ' . $name;
        }
        if ($entity->getTitleAfter()) {
            $name .= ', ' . $entity->getTitleAfter();
        }

        return $name;
    }
}
