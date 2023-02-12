<?php

namespace App\Services;

use App\Enum\PartnershipStatus;
use App\Exceptions\User\UserAlreadyExistException;
use App\Exceptions\User\UserDoesNotExistException;
use App\Http\Resources\StoreResource;
use App\Http\Resources\TgiGetUserBalance;
use App\Http\Resources\TgiRegisterResource;
use App\Http\Resources\UserResource;
use App\Interfaces\Repositories\AddressRepositoryInterface;
use App\Interfaces\Repositories\CommissionRepositoryInterface;
use App\Interfaces\Repositories\CountryRepositoryInterface;
use App\Interfaces\Repositories\PayoutRepositoryInterface;
use App\Interfaces\Repositories\PlanRepositoryInterface;
use App\Interfaces\Repositories\TheGateIndexRepositoryInterface;
use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Interfaces\Repositories\UserSubscriptionsRepositoryInterface;
use App\Interfaces\Services\UserServiceInterface;
use App\Traits\SortingTraits;
use Doctrine\DBAL\Types\BooleanType;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class UserService implements UserServiceInterface
{
    use SortingTraits;

    private $userRepository;
    private $theGateIndexRepository;
    private $commissionRepository;
    private $payoutRepository;
    private $userSubscriptionRepository;
    private $planRepository;
    private $countryRepository;
    private $addressRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        TheGateIndexRepositoryInterface $theGateIndexRepository,
        CommissionRepositoryInterface $commissionRepository,
        PayoutRepositoryInterface $payoutRepository,
        UserSubscriptionsRepositoryInterface $userSubscriptionRepository,
        PlanRepositoryInterface $planRepository,
        CountryRepositoryInterface $countryRepository,
        AddressRepositoryInterface $addressRepository
    ) {
        $this->userRepository = $userRepository;
        $this->theGateIndexRepository = $theGateIndexRepository;
        $this->commissionRepository = $commissionRepository;
        $this->payoutRepository = $payoutRepository;
        $this->userSubscriptionRepository = $userSubscriptionRepository;
        $this->planRepository = $planRepository;
        $this->countryRepository = $countryRepository;
        $this->addressRepository = $addressRepository;
    }

    public function findUsers($payload)
    {
        $sortField = $this->sortField($payload, 'first_name');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $user = $this->userRepository->findMany($payload, $sortField, $sortOrder);
        return UserResource::collection($user);
    }

    public function createUserFromTgiRegister($payload)
    {
        $tgi = $this->theGateIndexRepository->findUser($payload);
        $country = $this->countryRepository->findByName($payload['country']);

        if ($payload['is_partnership_paid'] == false) {
            if (!$tgi) {
                $user = $this->userRepository->create($payload);
                $this->theGateIndexRepository->createUser($payload, $user->id);
                $this->addressRepository->createAddressFromTgiRegister($payload, $user->id, $country->id);

                $data = (object) [
                    'status' => Response::HTTP_CREATED,
                    'user_id' => $user->id,
                    'message' => 'Successful'
                ];

                return $data;
            } else {
                $user = $this->updateUser($payload, $tgi->user_id);
                $this->theGateIndexRepository->updateUser($payload, $tgi->user_id);
                $this->addressRepository->updateAddressFromTgiRegister($payload, $user->id, $country->id);

                $data = (object) [
                    'status' => Response::HTTP_CREATED,
                    'user_id' => $user->id,
                    'message' => 'Successful'
                ];

                return $data;
            }

            throw new UserAlreadyExistException();
        } else {
            if (!$tgi) {
                $user = $this->userRepository->create($payload);
                $this->theGateIndexRepository->createUser($payload, $user->id);
                $this->addressRepository->createAddressFromTgiRegister($payload, $user->id, $country->id);
                $plan = $this->planRepository->findByKey($payload['partner_role_name']);

                $userSub = $this->userSubscriptionRepository->findSubscription($user->id);

                if (!$userSub) {
                    $payload = (object) [
                        'user_id' => $user->id,
                        'plan_id' => $plan->id
                    ];
                    $this->userSubscriptionRepository->create($payload);
                }

                $this->userSubscriptionRepository->update($user->id, $plan->id);

                $data = (object) [
                    'status' => Response::HTTP_CREATED,
                    'user_id' => $user->id,
                    'message' => 'Successful'
                ];

                return $data;
            } else {
                $user = $this->updateUser($payload, $tgi->user_id);
                $this->theGateIndexRepository->updateUser($payload, $tgi->user_id);
                $this->addressRepository->updateAddressFromTgiRegister($payload, $user->id, $country->id);
                $plan = $this->planRepository->findByKey($payload['partner_role_name']);

                $userSub = $this->userSubscriptionRepository->findSubscription($user->id);

                if (isset($plan)) {
                    if (!$userSub) {
                        $payload = (object) [
                            'user_id' => $user->id,
                            'plan_id' => $plan->id
                        ];
                        $this->userSubscriptionRepository->create($payload);
                    }
                }

                $this->userSubscriptionRepository->update($user->id, $plan->id);

                $data = (object) [
                    'status' => Response::HTTP_CREATED,
                    'user_id' => $user->id,
                    'message' => 'Successful'
                ];

                return $data;
            }
        }
    }

    public function createUserFromTgiLogin($payload)
    {
        $tgi = $this->theGateIndexRepository->findUser($payload);
        $country = $this->countryRepository->findByName($payload['country']);

        if ($payload['is_partnership_paid'] == false) {
            if (!$tgi) {
                $user = $this->userRepository->create($payload);
                $this->theGateIndexRepository->createUser($payload, $user->id);
                $this->addressRepository->createAddressFromTgiLogin($payload, $user->id, $country->id);

                $data = (object) [
                    'status' => Response::HTTP_CREATED,
                    'user_id' => $user->id,
                    'email' => $user->email,
                    'message' => 'Successful'
                ];

                return $data;
            } else {
                $user = $this->updateUser($payload, $tgi->user_id);
                $this->theGateIndexRepository->updateUser($payload, $tgi->user_id);
                $this->addressRepository->updateAddressFromTgiLogin($payload, $tgi->user_id, $country->id);

                $data = (object) [
                    'status' => Response::HTTP_CREATED,
                    'user_id' => $user->id,
                    'email' => $user->email,
                    'message' => 'Successful'
                ];

                return $data;
            }
        } else {
            if (!$tgi) {
                $user = $this->userRepository->create($payload);
                $this->theGateIndexRepository->createUser($payload, $user->id);
                $this->addressRepository->createAddressFromTgiLogin($payload, $user->id, $country->id);
                $plan = $this->planRepository->findByKey($payload['partner_role_name']);

                $userSub = $this->userSubscriptionRepository->findSubscription($user->id);

                if (!$userSub) {
                    $payload = (object) [
                        'user_id' => $user->id,
                        'plan_id' => $plan->id
                    ];
                    $this->userSubscriptionRepository->create($payload);
                }

                $this->userSubscriptionRepository->update($user->id, $plan->id);

                $data = (object) [
                    'status' => Response::HTTP_CREATED,
                    'user_id' => $user->id,
                    'email' => $user->email,
                    'message' => 'Successful'
                ];

                return $data;
            } else {
                $user = $this->updateUser($payload, $tgi->user_id);
                $this->theGateIndexRepository->updateUser($payload, $tgi->user_id);
                $this->addressRepository->updateAddressFromTgiLogin($payload, $tgi->user_id, $country->id);
                $plan = $this->planRepository->findByKey($payload['partner_role_name']);

                $userSub = $this->userSubscriptionRepository->findSubscription($user->id);

                if (!$userSub) {
                    $payload = (object) [
                        'user_id' => $user->id,
                        'plan_id' => $plan->id
                    ];
                    $this->userSubscriptionRepository->create($payload);
                }

                $this->userSubscriptionRepository->update($user->id, $plan->id);

                $data = (object) [
                    'status' => Response::HTTP_CREATED,
                    'user_id' => $user->id,
                    'email' => $user->email,
                    'message' => 'Successful'
                ];

                return $data;
            }
        }
    }

    public function findUserBalance($payload)
    {
        $tgi = $this->theGateIndexRepository->findUser($payload);

        if (!$tgi) {
            throw new UserDoesNotExistException();
        }

        $commissions = $this->commissionRepository->getUnpaidTotalCommissionTgi($tgi->user_id);
        $payouts = $this->payoutRepository->findTotalPayout($tgi->user_id);

        $data = (object) [
            'balance_money' => $commissions,
            'balance_currency' => "EUR",
            'paid_total' => $payouts,
            'refunded_total' => 0,
            'visits_total' => 0,
            'visits_today' => 0,
            'commission_rate' => 0,
            'conversion_rate' => 0
        ];

        return new TgiGetUserBalance($data);
    }

    public function findTgiUser($payload)
    {
        $tgiUser = $this->theGateIndexRepository->findUser($payload);

        if (!$tgiUser) {
            return response()->json(false);
        }
        return response()->json(true);
    }

    public function findUser($userId)
    {
        $user = $this->userRepository->findOneById($userId);
        return new UserResource($user);
    }

    public function findStoresByStoreOwner($payload, $userId)
    {
        $sortField = $this->sortField($payload, 'store_name');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $user = $this->userRepository->findStoresByStoreOwnerId($payload, $userId, $sortField, $sortOrder);
        return StoreResource::collection($user);
    }

    public function updateUser($payload, $userId)
    {
        DB::beginTransaction();
        try {
            $this->userRepository->update($payload, $userId);
            DB::commit();

            $user = $this->userRepository->findOneById($userId);
            return new UserResource($user);
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function updateUserStatus($payload, $userId)
    {
        $user = $this->userRepository->updateStatus($payload, $userId);
        return new UserResource($user);
    }

    public function updateUserPassword($payload, $userId)
    {
        $user = $this->userRepository->updatePassword($payload, $userId);
        return new UserResource($user);
    }

    public function updateUserImage($payload, $userId)
    {
        $user = $this->userRepository->updateImage($payload, $userId);
        return new UserResource($user);
    }

    public function disableUser2FAStatusData($userId)
    {
        $user = $this->userRepository->disable2FAStatus($userId);
        return new UserResource($user);
    }
}
