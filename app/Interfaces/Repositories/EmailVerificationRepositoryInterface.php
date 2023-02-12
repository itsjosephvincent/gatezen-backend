<?php

namespace App\Interfaces\Repositories;

interface EmailVerificationRepositoryInterface
{
    public function create(string $email);
    public function verify(object $payload);
}
