<?php

namespace App\Interfaces\Services;

interface SupportFormServiceInterface
{
    public function sendSupportFormEmail(object $payload);
}
