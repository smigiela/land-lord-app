<?php

namespace App\Residence\Domain\Value;

use App\Shared\Domain\InvalidLivingAreaException;

final class LivingArea
{
    /**
     * @throws InvalidLivingAreaException
     */
    public function __construct(
        private float $livingArea
    )
    {
        $this->guard();
    }

    public function getLivingArea(): float
    {
        return $this->livingArea;
    }

    /**
     * @throws InvalidLivingAreaException
     */
    private function guard(): void
    {
        if ($this->livingArea < 0) {
            throw new InvalidLivingAreaException("Invalid living area");
        }
    }
}