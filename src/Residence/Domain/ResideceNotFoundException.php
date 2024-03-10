<?php

namespace App\Residence\Domain;

use Throwable;

final class ResideceNotFoundException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Residence was not found");
    }
}