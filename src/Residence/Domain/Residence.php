<?php

namespace App\Residence\Domain;

use App\Residence\Domain\Enum\ResidenceType;
use App\Residence\Domain\Value\Description;
use App\Residence\Domain\Value\Floor;
use App\Residence\Domain\Value\LivingArea;
use App\Residence\Infrastructure\ResidenceRepository;
use App\Shared\Domain\Value\Address;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResidenceRepository::class)]
class Residence
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column(type: Types::STRING, enumType: ResidenceType::class)]
    private ?ResidenceType $type;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $ownershipStartDate;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?LivingArea $livingArea;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?Description $description;

    #[ORM\Column(nullable: true)]
    private ?Floor $floor;

    #[ORM\Embedded(class: Address::class)]
    private Address $address;

    public function __construct(
        int $id,
        ResidenceType $type,
        \DateTimeImmutable $ownershipStartDate,
        LivingArea $livingArea,
        Description $description,
        Floor $floor,
        Address $address
    )
    {
        $this->id = $id;
        $this->type = $type;
        $this->ownershipStartDate = $ownershipStartDate;
        $this->livingArea = $livingArea;
        $this->description = $description;
        $this->address = $address;
        $this->floor = $floor;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
