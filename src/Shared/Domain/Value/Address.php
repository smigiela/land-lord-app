<?php

namespace App\Shared\Domain\Value;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
final class Address
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::STRING, length: 150)]
    private ?string $city = null;

    #[ORM\Column(type: Types::STRING, length: 100)]
    private ?string $country = null;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $street = null;

    #[ORM\Column(type: Types::STRING, length: 50, nullable: true)]
    private ?string $streetNumber = null;

    #[ORM\Column(type: Types::STRING, length: 50, nullable: true)]
    private ?string $apartmentNumber = null;
    #[ORM\Column(type: Types::STRING, length: 6, nullable: false)]
    private ?ZipCode $zipCode = null;

    public function __construct(
        ZipCode $zipCode,
        string $city,
        string $street,
        string $streetNumber,
        ?string $apartmentNumber,
    )
    {}

    public function getStreet(): string
    {
        return $this->street;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getZipCode(): ZipCode
    {
        return $this->zipCode;
    }

    public function getStreetNumber(): string
    {
        return $this->streetNumber;
    }

    public function getApartmentNumber(): ?string
    {
        return $this->apartmentNumber;
    }

    public function toString(): string
    {
        $string = $this->getZipCode()->toString() . ' ' . $this->getCity() . ', ' . $this->getStreet() . ' ' . $this->getStreetNumber();

        if ($this->getApartmentNumber()) {
            $string = $string . '/' . $this->getApartmentNumber();
        }
        return $string;
    }

    public function toArray(): array
    {
        return [
            'zip_code' => $this->zipCode->toString(),
            'street' => $this->street,
            'street_number' => $this->streetNumber,
            'apartment_number' => $this->apartmentNumber,
            'city' => $this->city
        ];
    }
}
