<?php

namespace App\Interfaces\Services;

use App\Models\Store;

interface ForgotPasswordServiceInterface
{
    public function adminForgotPass(object $payload);
    public function adminResetPass(object $payload);
    public function userForgotPass(object $payload);
    public function userResetPass(object $payload);
    public function customerForgotPass(object $payload, Store $store);
    public function customerResetPass(object $payload);
    public function resetPasswordVerification(object $payload);
}
