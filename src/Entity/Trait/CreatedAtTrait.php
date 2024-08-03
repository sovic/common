<?php

namespace Sovic\Common\Entity\Trait;

use DateTimeImmutable;
use Doctrine\ORM\Mapping\Column;

trait CreatedAtTrait
{
    #[Column(name: "created_at", type: "datetime_immutable", nullable: false)]
    private DateTimeImmutable $createdAt;

    public function __construct()
    {
        $this->createdAt = new DateTimeImmutable();
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}
