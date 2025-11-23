<?php

namespace Sovic\Common\Entity\Trait;

use DateTimeImmutable;
use Doctrine\ORM\Mapping\Column;

trait UpdatedAtTrait
{
    #[Column(name: "updated_at", type: "datetime_immutable", nullable: false)]
    private DateTimeImmutable $updatedAt;

    public function __construct()
    {
        $this->updatedAt = new DateTimeImmutable();
    }

    public function getUpdatedAt(): DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTimeImmutable $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}
