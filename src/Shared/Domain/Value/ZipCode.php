<?php

namespace App\Shared\Domain\Value;

use App\Shared\Domain\InvalidZipCodeException;

final class ZipCode
{

    public function __construct(private string $zipCode)
    {
        $this->guard();
    }

    public function toString(): string
    {
        return $this->zipCode;
    }

    /**
     * @throws InvalidZipCodeException
     */
    private function guard(): void
    {
        if (strlen($this->zipCode) !== 6) {
            throw new InvalidZipCodeException('Wrong zip code length');
        }

        if (preg_match('#\d{2}-\d{3}/#', $this->zipCode)) {
            throw new InvalidZipCodeException('Wrong zip code format');
        }
    }
}
