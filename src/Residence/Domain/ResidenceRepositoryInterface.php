<?php

namespace App\Residence\Domain;

interface ResidenceRepositoryInterface
{
    public function get(int $id): Residence;
    public function save(Residence $residence): void;
}