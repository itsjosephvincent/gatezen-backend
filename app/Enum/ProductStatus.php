<?php

namespace App\Enum;

enum ProductStatus: string
{
    case Pending = 'pending';
    case Draft = 'draft';
    case Active = 'active';
    case Deactivated = 'deactivated';
    case Coming_Soon = 'coming_soon';
}
