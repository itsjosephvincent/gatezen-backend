<?php

namespace App\Enum;

enum ShippingMethodKey: string
{
    case FlatRate = 'flat_rate';
    case Free = 'free';
}
