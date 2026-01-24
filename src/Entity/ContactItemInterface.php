<?php

namespace Sovic\Common\Entity;

use Sovic\Common\Enum\ContactTypeId;
use Sovic\Common\Enum\CountryId;

interface ContactItemInterface
{
    public function getId(): int;

    public function getTypeId(): ContactTypeId;

    public function getValue(): string;

    public function setValue(string $value): void;

    public function getNote(): ?string;

    public function getCountry(): ?CountryId;

    public function isFlagged(): bool;
}
