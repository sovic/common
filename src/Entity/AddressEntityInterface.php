<?php

namespace Sovic\Common\Entity;

use Sovic\Common\Enum\CountryId;

interface AddressEntityInterface
{
    public function getStreet(): ?string;

    public function getDescriptiveNumber(): ?string;

    public function getOrientationNumber(): ?string;

    public function getCity(): ?string;

    public function getCityPart(): ?string;

    public function getZipCode(): ?string;

    public function getCountry(): ?CountryId;
}
