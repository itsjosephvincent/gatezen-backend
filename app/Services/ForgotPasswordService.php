<?php

namespace App\Services;

use App\Exceptions\Auth\InvalidEmailException;
use App\Exceptions\Auth\InvalidResetPasswordTokenException;
use App\Interfaces\Repositories\AdminRepositoryInterface;
use App\Interfaces\Repositories\CustomerRepositoryInterface;
use App\Interfaces\Repositories\PasswordResetRepositoryInterface;
use App\Interfaces\Repositories\StoreRepositoryInterface;
use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Interfaces\Services\ForgotPasswordServiceInterface;
use App\Jobs\SendAdminForgotPasswordEmail;
use App\Jobs\SendCustomerForgotPasswordEmail;
use App\Jobs\SendUserForgotPasswordEmail;
use Illuminate\Support\Str;

class ForgotPasswordService implements ForgotPasswordServiceInterface
{
    private $adminRepository;
    private $userRepository;
    private $customerRepository;
    private $storeRepository;
    private $passwordResetRepository;

    public function __construct(
        AdminRepositoryInterface $adminRepository,
        UserRepositoryInterface $userRepository,
        CustomerRepositoryInterface $customerRepository,
        StoreRepositoryInterface $storeRepository,
        PasswordResetRepositoryInterface $passwordResetRepository
    ) {
        $this->adminRepository = $adminRepository;
        $this->userRepository = $userRepository;
        $this->customerRepository = $customerRepository;
        $this->storeRepository = $storeRepository;
        $this->passwordResetRepository = $passwordResetRepository;
    }

    public function adminForgotPass($payload)
    {
        $admin = $this->adminRepository->findOneByEmail($payload->email);
        if ($admin) {
            $token = Str::random(60);
            $this->passwordResetRepository->create($admin->email, $token);
            SendAdminForgotPasswordEmail::dispatch($admin->first_name, $admin->last_name, $admin->email, $token)
                ->onQueue('sendemail');
        } else {
            throw new InvalidEmailException();
        }
    }

    public function adminResetPass($payload)
    {
        $passwordReset = $this->passwordResetRepository->findOneByToken($payload->token);
        if ($passwordReset) {
            $admin = $this->adminRepository->findOneByEmail($passwordReset->email);
            $this->adminRepository->updatePassword($payload, $admin->id);
            $this->passwordResetRepository->delete($payload->token);
        } else {
            throw new InvalidResetPasswordTokenException();
        }
    }

    public function userForgotPass($payload)
    {
        $user = $this->userRepository->findOneByEmail($payload->email);
        if ($user) {
            $token = Str::random(60);
            $name = $user->first_name . ' ' . $user->last_name;
            $this->passwordResetRepository->create($payload->email, $token);
            SendUserForgotPasswordEmail::dispatch($user->email, $name, $token)
                ->onQueue('sendemail');
        } else {
            throw new InvalidEmailException();
        }
    }

    public function userResetPass($payload)
    {
        $passwordReset = $this->passwordResetRepository->findOneByToken($payload->token);
        if ($passwordReset) {
            $user = $this->userRepository->findOneByEmail($passwordReset->email);
            $this->userRepository->updatePassword($payload, $user->id);
            $this->passwordResetRepository->delete($payload->token);
        } else {
            throw new InvalidResetPasswordTokenException();
        }
    }

    public function customerForgotPass($payload, $store)
    {
        $customer = $this->customerRepository->findOneByEmail($payload->email);
        if ($customer) {
            $token = Str::random(60);
            $this->passwordResetRepository->create($customer->email, $token);
            SendCustomerForgotPasswordEmail::dispatch($customer->email, $store, $token)
                ->onQueue('sendemail');
        } else {
            throw new InvalidEmailException();
        }
    }

    public function customerResetPass($payload)
    {
        $passwordReset = $this->passwordResetRepository->findOneByToken($payload->token);
        if ($passwordReset) {
            $customer = $this->customerRepository->findOneByEmail($passwordReset->email);
            $this->customerRepository->updatePassword($payload, $customer->id);
            $this->passwordResetRepository->delete($payload->token);
        } else {
            throw new InvalidResetPasswordTokenException();
        }
    }

    public function resetPasswordVerification($payload)
    {
        $token = $this->passwordResetRepository->findOneByToken($payload->token);
        if (!$token) {
            throw new InvalidResetPasswordTokenException();
        }
    }
}
