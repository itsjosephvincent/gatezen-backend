<?php

namespace App\Enum;

enum PayoutStatus: string
{
    case New = 'new';
    case Pending = 'pending';
    case Completed = 'completed';
    case Cancelled = 'cancelled';
}
