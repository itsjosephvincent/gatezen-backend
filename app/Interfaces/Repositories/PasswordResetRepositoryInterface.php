<?php

namespace App\Interfaces\Repositories;

interface PasswordResetRepositoryInterface
{
    public function create(string $email, string $token);
    public function findOneByToken(string $token);
    public function delete(string $token);
}
