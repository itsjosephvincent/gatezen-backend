<?php

namespace App\Enum;

enum StoreCategoryStatus: string
{
    case AvailableNow = 'available_now';
    case ComingSoon = 'coming_soon';
    case Deactivated = 'deactivated';
    case PreLaunch = 'pre_launch';
}
