<?php

namespace App\Http\Controllers\Api\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CbdPreOrderRequest;
use App\Http\Requests\StripeRequest;
use App\Http\Requests\CheckSessionRequest;
use App\Http\Requests\KlarnaRequest;
use App\Interfaces\Services\PaymentMethodServiceInterface;
use App\Interfaces\Services\PaymentServiceInterface;
use App\Models\Store;
use Illuminate\Http\JsonResponse;

class PaymentController extends Controller
{
    private $paymentService;
    private $paymentMethodService;

    public function __construct(PaymentServiceInterface $paymentService, PaymentMethodServiceInterface $paymentMethodService)
    {
        $this->paymentService = $paymentService;
        $this->paymentMethodService = $paymentMethodService;
    }

    public function getPaymentMethods(): JsonResponse
    {
        return $this->paymentMethodService->findPaymentMethods()->response();
    }

    public function cbdPreOrder(CbdPreOrderRequest $request, Store $store): JsonResponse
    {
        return $this->paymentService->saveCbdPreOrderData($request->address_type, $store)->response();
    }

    public function stripePayment(StripeRequest $request, Store $store)
    {
        $payload = (object) $request->only([
            'success_url',
            'cancel_url',
            'country'
        ]);

        return $this->paymentService->saveStripePaymentData($payload, $store);
    }

    public function klarnaPayment(KlarnaRequest $request, Store $store)
    {
        $payload = (object) $request->only([
            'success_url',
            'cancel_url',
            'terms_url',
            'country'
        ]);

        return $this->paymentService->saveKlarnaPaymentData($payload, $store);
    }

    public function validatePayment(CheckSessionRequest $request, Store $store)
    {
        $payload = (object) $request->only([
            'payment_method',
            'address_type',
            'checkout_session_id'
        ]);

        return $this->paymentService->checkPayment($payload, $store);
    }
}
