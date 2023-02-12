<?php

namespace App\Enum;

enum StoreStatus: string
{
    case Active = 'active';
    case Deactivated = 'deactivated';
    case Pending = 'pending';
}
