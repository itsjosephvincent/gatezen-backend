<?php

namespace App\Interfaces\Services;

interface EmailVerificationServiceInterface
{
    public function verifyEmailData(string $token);
}
