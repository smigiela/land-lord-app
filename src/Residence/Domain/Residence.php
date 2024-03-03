<?php

namespace App\Residence\Domain;

final class Residence
{
    private ?int $id = null;

    private ?string $type = null;

    private ?\DateTimeInterface $ownership_start_date = null;

    private ?string $living_area = null;

    private ?string $description = null;

    private ?int $floor = null;

    public function __construct(
        int $id,
        string $type,
        \DateTimeInterface $ownership_start_date,
        string $living_area,
        string $description,
        int $floor
    )
    {
        $this->id = $id;
        $this->type = $type;
        $this->ownership_start_date = $ownership_start_date;
        $this->living_area = $living_area;
        $this->description = $description;
        $this->floor = $floor;
    }

    public function getId(): ?int { return $this->id; }

    public function setId(int $id): void { $this->id = $id; }

    public function getType(): ?string { return $this->type; }

    public function setType(string $type): void { $this->type = $type; }

    public function getOwnershipStartDate(): ?\DateTimeInterface { return $this->ownership_start_date; }

    public function setOwnershipStartDate(?\DateTimeInterface $ownership_start_date): void { $this->ownership_start_date = $ownership_start_date; }
    public function getLivingArea(): ?string { return $this->living_area; }

    public function setLivingArea(?string $living_area): void { $this->living_area = $living_area; }

    public function getDescription(): ?string { return $this->description; }

    public function setDescription(?string $description): void {  $this->description = $description; }

    public function getFloor(): ?int {  return $this->floor; }


    public function setFloor(?int $floor): void { $this->floor = $floor; }
}