<?php

namespace App\Interfaces\Services;

use App\Models\Store;

interface AuthServiceInterface
{
    public function authenticateAdmin(object $payload);
    public function authenticateUser(object $payload);
    public function authenticateUserFromTgi(string $email);
    public function authenticateCustomer(object $payload, Store $store);
    public function logout(object $request);
    public function validateGoogle2FACode($google2FASecret, $secret);
    public function loginFromTgi($request);
}
