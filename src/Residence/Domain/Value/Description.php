<?php

namespace App\Residence\Domain\Value;

use InvalidArgumentException;

final class Description
{
    /**
     * @throws InvalidArgumentException
     */
    public function __construct(
        private string $description
    )
    {
        $this->guard();
    }

    public function getFloor(): string
    {
        return $this->description;
    }

    /**
     * @throws InvalidArgumentException
     */
    private function guard(): void
    {
        if (strlen($this->description) <= 10 || strlen($this->description) > 250) {
            throw new InvalidArgumentException("Invalid description length. Description must be between 10 and 250 characters");
        }
    }
}