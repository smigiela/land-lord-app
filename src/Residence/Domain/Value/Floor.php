<?php

namespace App\Residence\Domain\Value;

use App\Shared\Domain\InvalidFloorException;

final class Floor
{
    /**
     * @throws InvalidFloorException
     */
    public function __construct(
        private int $floor
    )
    {
        $this->guard();
    }

    public function getFloor(): int
    {
        return $this->floor;
    }

    /**
     * @throws InvalidFloorException
     */
    private function guard(): void
    {
        if ($this->floor < 0) {
            throw new InvalidFloorException("Invalid floor");
        }
    }
}