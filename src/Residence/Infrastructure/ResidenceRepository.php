<?php

namespace App\Residence\Infrastructure;

use App\Residence\Domain\ResideceNotFoundException;
use App\Residence\Domain\Residence;
use App\Residence\Domain\ResidenceRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;

class ResidenceRepository implements ResidenceRepositoryInterface
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {}

    /**
     * @throws OptimisticLockException
     * @throws ResideceNotFoundException
     * @throws ORMException
     */
    public function get(int $id): Residence
    {
        return $this->entityManager->find(Residence::class, $id)
            ?? throw new ResideceNotFoundException();
    }

    public function save(Residence $residence): void
    {
        $this->entityManager->persist($residence);
        $this->entityManager->flush();
    }
}
