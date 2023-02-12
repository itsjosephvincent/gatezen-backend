<?php

use App\Http\Controllers\Api\Customer\CustomerController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Customer\CartController;
use App\Http\Controllers\Api\Customer\CountryController;
use App\Http\Controllers\Api\Customer\CustomerAddressController;
use App\Http\Controllers\Api\Customer\PaymentController;
use App\Http\Controllers\Api\Customer\OrderController;
use App\Http\Middleware\IdentifyStore;
use Illuminate\Support\Facades\Route;

// Protected routes
Route::middleware('auth:sanctum')->group(function () {

    Route::group([
        'middleware' => \App\Http\Middleware\IdentifyStore::class
    ], function () {
        Route::apiResources([
            'cart' => CartController::class,
            'customer-address' => CustomerAddressController::class,
            'orders' => OrderController::class,
        ]);
    });

    Route::group([
        'middleware' => \App\Http\Middleware\IdentifyStore::class,
        'prefix' => 'checkout'
    ], function () {
        Route::post('/pre-order', [PaymentController::class, 'cbdPreOrder']);
        Route::post('/stripe', [PaymentController::class, 'stripePayment']);
        Route::post('/klarna', [PaymentController::class, 'klarnaPayment']);
        Route::post('/payment', [PaymentController::class, 'validatePayment']);
    });

    Route::group([
        'middleware' => \App\Http\Middleware\IdentifyStore::class,
        'prefix' => 'all-countries'
    ], function () {
        Route::get('/', [CountryController::class, 'index']);
    });

    Route::group([
        'middleware' => \App\Http\Middleware\IdentifyStore::class
    ], function () {
        Route::get('/account-details', [CustomerController::class, 'getLoggedInCustomer']);
        Route::get('/checkout/payment-methods', [PaymentController::class, 'getPaymentMethods']);
        Route::post('/sync-guest-cart', [CartController::class, 'syncItems']);
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::put('/update-account-details', [CustomerController::class, 'updateAccountDetails']);
    });
});
