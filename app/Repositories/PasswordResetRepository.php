<?php

namespace App\Repositories;

use App\Interfaces\Repositories\PasswordResetRepositoryInterface;
use App\Models\PasswordReset;
use Carbon\Carbon;

class PasswordResetRepository implements PasswordResetRepositoryInterface
{
    public function create($email, $token)
    {
        $passReset = new PasswordReset();
        $passReset->email = $email;
        $passReset->token = $token;
        $passReset->created_at = Carbon::now();
        $passReset->save();
        return $passReset;
    }

    public function findOneByToken($token)
    {
        return PasswordReset::where('token', $token)->first();
    }

    public function delete($token)
    {
        return PasswordReset::where('token', $token)->delete();
    }
}
