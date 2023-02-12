<?php

namespace App\Enum;

enum OrderStatus: string
{
    case Pending = 'pending';
    case Ready_To_Ship = 'ready_to_ship';
    case Shipped = 'shipped';
    case Delivered = 'delivered';
    case Cancelled = 'cancelled';
    case PreOrder = 'pre_order';
}
