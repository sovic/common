<?php

namespace Sovic\Common\Twig;

use Sovic\Common\Entity\NameEntityInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class NameExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('format_name', $this->formatName(...)),
        ];
    }

    public function formatName(?NameEntityInterface $entity): string
    {
        if (!$entity) {
            return '';
        }

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
