<?php

namespace Sovic\Common\Twig;

use Sovic\Common\Entity\NameEntityInterface;
use Sovic\Common\Helpers\Name;
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

        return Name::formatName($entity);
    }
}
