<?php

namespace App\Enum;

enum CustomerAddressType: string
{
    case Billing = 'billing';
    case Shipping = 'shipping';
}
