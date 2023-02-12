<?php

namespace App\Interfaces\Services;

use App\Models\Store;

interface ContactUsServiceInterface
{
    public function sendContactUsEmail(object $payload, Store $store);
}
