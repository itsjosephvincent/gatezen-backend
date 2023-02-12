<?php

namespace App\Services;

use App\Http\Resources\PaymentMethodResource;
use App\Interfaces\Repositories\PaymentMethodRepositoryInterface;
use App\Interfaces\Services\PaymentMethodServiceInterface;

class PaymentMethodService implements PaymentMethodServiceInterface
{
    private $paymentMethodRepository;

    public function __construct(PaymentMethodRepositoryInterface $paymentMethodRepository)
    {
        $this->paymentMethodRepository = $paymentMethodRepository;
    }

    public function findPaymentMethods($sortField = 'id', $sortOrder = 'asc')
    {
        $paymentMethod = $this->paymentMethodRepository->findMany($sortField, $sortOrder);
        return PaymentMethodResource::collection($paymentMethod);
    }
}
