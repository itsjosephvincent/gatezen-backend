<?php

namespace App\Services;

use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Interfaces\Services\SupportFormServiceInterface;
use App\Jobs\SendContactUsEmail;
use App\Jobs\SendSupportFormEmail;

class SupportFormService implements SupportFormServiceInterface
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function sendSupportFormEmail($payload)
    {
        $userId = auth()->user()->id;

        $user = $this->userRepository->findOneById($userId);

        $name = $user->first_name . ' ' . $user->last_name;

        SendSupportFormEmail::dispatch($name, $user->email, $payload->subject, $payload->inquiry)
            ->onQueue('sendemail');
    }
}
