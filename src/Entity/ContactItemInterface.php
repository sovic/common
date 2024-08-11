<?php

namespace Sovic\Common\Entity;

use Sovic\Common\Enum\ContactTypeId;

interface ContactItemInterface
{
    public function getId(): int;

    public function getTypeId(): ContactTypeId;

    public function getValue(): string;

    public function getNote(): ?string;
}
