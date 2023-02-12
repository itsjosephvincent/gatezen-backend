<?php

namespace App\Services;

use App\Exceptions\Auth\Invalid2FACodeException;
use App\Exceptions\Auth\InvalidCredentialsException;
use App\Http\Resources\AdminAuthResource;
use App\Traits\EncryptionTraits;
use PragmaRX\Google2FA\Google2FA;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\AdminResource;
use App\Http\Resources\CustomerrAuthResource;
use App\Http\Resources\UserAuthResource;
use App\Http\Resources\UserResource;
use App\Interfaces\Repositories\AddressRepositoryInterface;
use App\Interfaces\Services\AuthServiceInterface;
use App\Interfaces\Repositories\AdminRepositoryInterface;
use App\Interfaces\Repositories\CountryRepositoryInterface;
use App\Interfaces\Repositories\CustomerRepositoryInterface;
use App\Interfaces\Repositories\StoreOwnersRepositoryInterface;
use App\Interfaces\Repositories\StoreRepositoryInterface;
use App\Interfaces\Repositories\TheGateIndexRepositoryInterface;
use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Interfaces\Services\UserServiceInterface;

class AuthService implements AuthServiceInterface
{
    use EncryptionTraits;

    private $adminRepository;
    private $userRepository;
    private $customerRepository;
    private $storeRepository;
    private $storeOwnerRepository;
    private $theGateIndexRepository;
    private $addressRepository;
    private $countryRepository;
    private $userService;

    public function __construct(
        AdminRepositoryInterface $adminRepository,
        UserRepositoryInterface $userRepository,
        CustomerRepositoryInterface $customerRepository,
        StoreRepositoryInterface $storeRepository,
        StoreOwnersRepositoryInterface $storeOwnerRepository,
        TheGateIndexRepositoryInterface $theGateIndexRepository,
        AddressRepositoryInterface $addressRepository,
        CountryRepositoryInterface $countryRepository,
        UserServiceInterface $userService
    ) {
        $this->adminRepository = $adminRepository;
        $this->userRepository = $userRepository;
        $this->customerRepository = $customerRepository;
        $this->storeRepository = $storeRepository;
        $this->storeOwnerRepository = $storeOwnerRepository;
        $this->theGateIndexRepository = $theGateIndexRepository;
        $this->addressRepository = $addressRepository;
        $this->countryRepository = $countryRepository;
        $this->userService = $userService;
    }

    public function authenticateAdmin($payload)
    {
        $email = $payload->email;
        $password = $payload->password;
        $admin = $this->adminRepository->findOneByEmail($email);
        if (!$admin) {
            throw new InvalidCredentialsException();
        } else {
            if (!Hash::check($password, $admin->password)) {
                throw new InvalidCredentialsException();
            } else {
                // Google 2FA is enabled
                if ($admin->is_2fa_enabled == 'google') {
                    $code = $payload->verification_code;
                    $google2FASecret = $admin->google_2fa_secret;
                    $isValidGoogle2FACode = $this->validateGoogle2FACode($google2FASecret, $code);
                    if (!$isValidGoogle2FACode) {
                        throw new Invalid2FACodeException();
                    }
                }
            }
        }

        $token = $admin->createToken('auth-token')->plainTextToken;
        $data = (object) [
            'role' => $admin->getRoleNames(),
            'token' => $token,
            'admin' => new AdminResource($admin)
        ];
        return new AdminAuthResource($data);
    }

    public function authenticateUser($payload)
    {
        $email = $payload->email;
        $password = $payload->password;
        $user = $this->userRepository->findOneByEmail($email);

        if (!$user) {
            throw new InvalidCredentialsException();
        } else {
            if (!Hash::check($password, $user->password)) {
                throw new InvalidCredentialsException();
            } else {
                // Google 2FA is enabled
                if ($user->is_2fa_enabled == 'google') {
                    $code = $payload->verification_code;
                    $google2FASecret = $user->google_2fa_secret;
                    $isValidGoogle2FACode = $this->validateGoogle2FACode($google2FASecret, $code);
                    if (!$isValidGoogle2FACode) {
                        throw new Invalid2FACodeException();
                    }
                }
            }
        }

        $token = $user->createToken('auth-token')->plainTextToken;
        $data = (object) [
            'token' => $token,
            'user' => new UserResource($user)
        ];

        return new UserAuthResource($data);
    }

    public function authenticateUserFromTgi($email)
    {
        $user = $this->userRepository->findOneByEmail($email);

        if (!$user) {
            throw new InvalidCredentialsException();
        }

        $token = $user->createToken('auth-token')->plainTextToken;

        $data = (object) [
            'token' => $token,
            'user' => new UserResource($user)
        ];

        return new UserAuthResource($data);
    }

    public function authenticateCustomer($payload, $store)
    {
        $email = $payload->email;
        $password = $payload->password;
        $customer = $this->customerRepository->findOneByEmail($email);

        if (!$customer) {
            throw new InvalidCredentialsException();
        } else {
            if ($store) {
                if ($store->id == $customer->store_id) {
                    if (!Hash::check($password, $customer->password)) {
                        throw new InvalidCredentialsException();
                    } else {
                        // Google 2FA is enabled
                        if ($customer->is_2fa_enabled == 'google') {
                            $code = $payload->verification_code;
                            $google2FASecret = $customer->google_2fa_secret;
                            $isValidGoogle2FACode = $this->validateGoogle2FACode($google2FASecret, $code);
                            if (!$isValidGoogle2FACode) {
                                throw new Invalid2FACodeException();
                            }
                        }
                    }
                } else {
                    throw new InvalidCredentialsException();
                }
            } else {
                throw new InvalidCredentialsException();
            }
        }

        $token = $customer->createToken('auth-token')->plainTextToken;
        $data = (object) [
            'token' => $token,
            'customer' => new UserResource($customer)
        ];
        return new CustomerrAuthResource($data);
    }

    public function logout($request)
    {
        return $request->user()->tokens()->delete();
    }

    public function validateGoogle2FACode($google2FASecret, $secret)
    {
        $google2fa = new Google2FA();
        $secretKey = $this->decrypt($google2FASecret);
        $window = 1;
        $valid = $google2fa->verifyKeyNewer($secretKey, $secret, $window);
        if (!$valid) {
            throw new Invalid2FACodeException();
        }
    }

    public function loginFromTgi($request)
    {
        $key = config('jwt.token');

        $set = \SimpleJWT\Keys\KeySet::createFromSecret($key);
        $jwt = \SimpleJWT\JWE::decrypt($request->jwt, $set, 'PBES2-HS256+A128KW');

        $jwtUserData = json_decode($jwt->getPlaintext(), true);
        $jwtUser = json_decode($jwtUserData['user'], true);

        $userData = $this->theGateIndexRepository->findUser($jwtUser);

        if (!$userData) {
            $user = $this->userService->createUserFromTgiLogin($jwtUser);

            $tgiUser = $this->authenticateUserFromTgi($user->email);

            return $tgiUser;
        } else {
            $user = $this->userService->createUserFromTgiLogin($jwtUser);

            $tgiUser = $this->authenticateUserFromTgi($user->email);

            return $tgiUser;
        }
    }
}
