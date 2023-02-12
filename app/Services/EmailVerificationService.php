<?php

namespace App\Services;

use App\Exceptions\Auth\InvalidEmailVerificationTokenException;
use App\Interfaces\Repositories\EmailVerificationRepositoryInterface;
use App\Interfaces\Services\EmailVerificationServiceInterface;
use App\Repositories\CustomerRepository;

class EmailVerificationService implements EmailVerificationServiceInterface
{
    private $emailVerificationRepository;

    public function __construct(EmailVerificationRepositoryInterface $emailVerificationRepository)
    {
        $this->emailVerificationRepository = $emailVerificationRepository;
    }

    public function verifyEmailData($token)
    {
        $email = $this->emailVerificationRepository->verify($token);

        if (!$email) {
            throw new InvalidEmailVerificationTokenException();
        }

        return $email;
    }
}
