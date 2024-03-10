<?php

namespace App\Shared\Domain;

use Throwable;

final class InvalidLivingAreaException extends \Exception
{
    public function __construct(string $message = "")
    {
        parent::__construct($message);
    }
}