<?php

namespace App\Residence\Domain\Enum;

enum ResidenceType: string
{
    case HOUSE = 'house';
    case APARTMENT = 'apartment';
    case ROOM = 'room';
    case BUSINESS_LOCAL = 'business_local';
}