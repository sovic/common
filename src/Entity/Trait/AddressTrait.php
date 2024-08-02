<?php

namespace Sovic\Common\Entity\Trait;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Symfony\Component\Validator\Constraints\Length;

trait AddressTrait
{
    // address label
    #[Length(max: 255)]
    #[Column(type: 'string', length: 255, nullable: true, options: ['default' => null])]
    public ?string $name = null;

    #[Length(max: 255)]
    #[Column(type: Types::STRING, length: 255, nullable: false)]
    public string $street;

    #[Length(max: 50)]
    #[Column(name: 'descriptive_number', type: Types::STRING, length: 50, nullable: true, options: ['default' => null])]
    public ?string $descriptiveNumber = null;

    #[Length(max: 50)]
    #[Column(name: 'orientation_number', type: Types::STRING, length: 50, nullable: true, options: ['default' => null])]
    public ?string $orientationNumber = null;

    #[Column(type: Types::STRING, length: 255, nullable: true, options: ['default' => null])]
    public ?string $city = null;

    #[Column(name: 'city_part', type: Types::STRING, length: 255, nullable: true, options: ['default' => null])]
    public ?string $cityPart = null;

    #[Column(name: 'zip_code', type: Types::STRING, length: 50, nullable: true, options: ['default' => null])]
    public ?string $zipCode = null;

    #[Column(type: Types::STRING, length: 50, nullable: true, options: ['default' => null])]
    public ?string $country = null;

    #[Length(max: 50)]
    #[Column(name: 'identification_number', type: Types::STRING, length: 50, nullable: true, options: ['default' => null])]
    public ?string $identificationNumber = null;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    public function getDescriptiveNumber(): ?string
    {
        return $this->descriptiveNumber;
    }

    public function setDescriptiveNumber(?string $descriptiveNumber): void
    {
        $this->descriptiveNumber = $descriptiveNumber;
    }

    public function getOrientationNumber(): ?string
    {
        return $this->orientationNumber;
    }

    public function setOrientationNumber(?string $orientationNumber): void
    {
        $this->orientationNumber = $orientationNumber;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    public function getCityPart(): ?string
    {
        return $this->cityPart;
    }

    public function setCityPart(?string $cityPart): void
    {
        $this->cityPart = $cityPart;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(?string $zipCode): void
    {
        $this->zipCode = $zipCode;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): void
    {
        $this->country = $country;
    }

    public function getIdentificationNumber(): ?string
    {
        return $this->identificationNumber;
    }

    public function setIdentificationNumber(?string $identificationNumber): void
    {
        $this->identificationNumber = $identificationNumber;
    }
}
