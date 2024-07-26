<?php

namespace Sovic\Common\Entity\Trait;

use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;

trait DeletedAtTrait
{
    #[Column(name: 'deleted_at', type: Types::DATETIME_IMMUTABLE, nullable: true, options: ['default' => null])]
    private ?DateTimeImmutable $deletedAt = null;

    public function setDeletedAt(?DateTimeImmutable $deletedAt): void
    {
        $this->deletedAt = $deletedAt;
    }

    public function getDeletedAt(): ?DateTimeImmutable
    {
        return $this->deletedAt;
    }
}
