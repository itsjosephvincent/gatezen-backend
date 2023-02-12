<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\User\AddressController;
use App\Http\Controllers\Api\User\BlogController;
use App\Http\Controllers\Api\User\CommissionController;
use App\Http\Controllers\Api\User\CustomerController;
use App\Http\Controllers\Api\User\DashboardController;
use App\Http\Controllers\Api\User\FaqController;
use App\Http\Controllers\Api\User\LogController;
use App\Http\Controllers\Api\User\MailJetController;
use App\Http\Controllers\Api\User\NewsController;
use App\Http\Controllers\Api\User\OrderController;
use App\Http\Controllers\Api\User\PayoutController;
use App\Http\Controllers\Api\User\StoreCategoryController;
use App\Http\Controllers\Api\User\StoreController;
use App\Http\Controllers\Api\User\StoreTemplateController;
use App\Http\Controllers\Api\User\SupportFormController;
use App\Http\Controllers\Api\User\UserBankDetailsController;
use App\Http\Controllers\Api\User\UserController;
use App\Http\Controllers\Api\User\UserSubscriptionController;

Route::middleware('auth:sanctum')->group(function () {

    Route::apiResources([
        'customers' => CustomerController::class,
        'sales' => OrderController::class,
        'stores' => StoreController::class,
        'store-users' => UserController::class,
        'templates' => StoreTemplateController::class,
        'address' => AddressController::class,
        'faqs' => FaqController::class,
        'blogs' => BlogController::class,
        'commissions' => CommissionController::class,
        'payouts' => PayoutController::class,
        'user-bank-details' => UserBankDetailsController::class,
        'user-subscriptions' => UserSubscriptionController::class,
        'news' => NewsController::class
    ]);

    Route::group(['prefix' => 'store-users'], function () {
        Route::get('/{storeUserId}/stores', [UserController::class, 'getStoreUserStores']);
        Route::put('/{storeUserId}/update-password', [UserController::class, 'updateUserPassword']);
        Route::put('/{storeUserId}/disable-2fa ', [UserController::class, 'disableGoogle2FAStatus']);
    });

    Route::group(['prefix' => 'stores'], function () {
        Route::get('/{storeId}/customers', [CustomerController::class, 'getStoreCustomers']);
        Route::get('/{storeId}/sales', [OrderController::class, 'getSalesList']);
        Route::get('/{storeId}/template', [StoreTemplateController::class, 'getStoreTemplate']);
        Route::put('/{storeId}/template-version', [StoreController::class, 'updateTemplateToLatest']);
    });

    Route::group(['prefix' => 'customers'], function () {
        Route::get('/{customerId}/orders', [CustomerController::class, 'getCustomerSales']);
    });

    Route::group(['prefix' => 'templates'], function () {
        Route::get('/store-category-templates/{storeCategoryId}', [StoreTemplateController::class, 'getStoreCategoryTemplate']);
    });

    Route::group(['prefix' => 'mail-jet'], function () {
        Route::post('/subscribe', [MailJetController::class, 'subListContact']);
        Route::post('/unsubscribe', [MailJetController::class, 'unsubListContact']);
    });

    Route::get('/all-commission-amount', [CommissionController::class, 'getTotalCommission']);
    Route::get('/all-store-categories', [StoreCategoryController::class, 'getAllStoreCategories']);
    Route::get('/all-bank-details', [UserBankDetailsController::class, 'getAllUserBankDetails']);
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/all-countries', [AddressController::class, 'getAllCountries']);
    Route::get('/logs', [LogController::class, 'getStoreLogsPerUser']);
    Route::post('/support-form', [SupportFormController::class, 'sendSupportEmail']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/update-image', [UserController::class, 'updateImage']);
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
    Route::post('/reset-password', [AuthController::class, 'resetPassword']);
    Route::put('/update-password', [UserController::class, 'updateUserPassword']);
});
