<?php

namespace Sovic\Common\Entity\Trait;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;

trait UserAgentTrait
{
    #[Column(name: 'user_agent', type: Types::STRING, length: 500, nullable: true, options: ['default' => null])]
    private ?string $userAgent = null;

    public function getUserAgent(): ?string
    {
        return $this->userAgent;
    }

    public function setUserAgent(?string $userAgent): void
    {
        $this->userAgent = $userAgent;
    }
}
