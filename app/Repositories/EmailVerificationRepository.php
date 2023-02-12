<?php

namespace App\Repositories;

use App\Http\Resources\CustomerResource;
use App\Interfaces\Repositories\EmailVerificationRepositoryInterface;
use App\Models\Customer;
use App\Models\EmailVerification;
use Carbon\Carbon;
use Illuminate\Support\Str;

class EmailVerificationRepository implements EmailVerificationRepositoryInterface
{

    public function create($email)
    {
        $token = Str::random(60);
        $emailVerification = new EmailVerification();
        $emailVerification->email = $email;
        $emailVerification->token = $token;
        $emailVerification->save();

        return $emailVerification->fresh();
    }

    public function verify($token)
    {
        $emailVerification = EmailVerification::where('token', $token)->first();
        $customer = Customer::where('email', $emailVerification->email)->first();
        $customer->email_verified_at = Carbon::now();
        $customer->save();
        $emailVerification->delete();

        return true;
    }
}
