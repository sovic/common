<?php

namespace Sovic\Common\Entity;

interface NameEntityInterface
{
    public function getName(): string;

    public function getSurname(): string;

    public function getTitleBefore(): ?string;

    public function getTitleAfter(): ?string;
}
