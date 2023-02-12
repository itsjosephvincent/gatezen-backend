<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Admin\LogController;
use App\Http\Controllers\Api\Admin\ZohoController;
use App\Http\Controllers\Api\Admin\AdminController;
use App\Http\Controllers\Api\Admin\BlogCategoryController;
use App\Http\Controllers\Api\Admin\BlogController;
use App\Http\Controllers\Api\Admin\CommissionController;
use App\Http\Controllers\Api\Admin\SalesController;
use App\Http\Controllers\Api\Admin\StoreController;
use App\Http\Controllers\Api\Admin\CountryController;
use App\Http\Controllers\Api\Admin\ProductController;
use App\Http\Controllers\Api\Admin\CustomerController;
use App\Http\Controllers\Api\Admin\DashboardController;
use App\Http\Controllers\Api\Admin\FaqCategoryController;
use App\Http\Controllers\Api\Admin\FaqController;
use App\Http\Controllers\Api\Admin\NotificationController;
use App\Http\Controllers\Api\Admin\PayoutController;
use App\Http\Controllers\Api\Admin\PayoutSettingsController;
use App\Http\Controllers\Api\Admin\PlanController;
use App\Http\Controllers\Api\Admin\ProductCategoryController;
use App\Http\Controllers\Api\Admin\StoreUserController;
use App\Http\Controllers\Api\Admin\ProductMediaController;
use App\Http\Controllers\Api\Admin\StoreCategoryController;
use App\Http\Controllers\Api\Admin\StoreTemplateController;
use App\Http\Controllers\Api\Admin\ProductInventoryController;
use App\Http\Controllers\Api\Admin\UserSubscriptionController;

// Protected routes
Route::middleware('auth:sanctum')->group(function () {

    Route::apiResources([
        'products/medias' => ProductMediaController::class,
        'store-categories' => StoreCategoryController::class,
        'controls' => AdminController::class,
        'stores' => StoreController::class,
        'products' => ProductController::class,
        'store-users' => StoreUserController::class,
        'logs' => LogController::class,
        'sales' => SalesController::class,
        'customers' => CustomerController::class,
        'store-templates' => StoreTemplateController::class,
        'faqs' => FaqController::class,
        'blogs' => BlogController::class,
        'commissions' => CommissionController::class,
        'payouts' => PayoutController::class,
        'plans' => PlanController::class,
        'store-owners-subscription' => UserSubscriptionController::class,
        'payout-settings' => PayoutSettingsController::class
    ]);

    Route::group(['prefix' => 'controls'], function () {
        Route::put('/{userId}/update-status', [AdminController::class, 'updateAdminStatus']);
        Route::put('/{userId}/update-password', [AdminController::class, 'updateAdminPassword']);
    });

    Route::group(['prefix' => 'stores'], function () {
        Route::get('/{storeId}/sales', [StoreController::class, 'showStoreOrders']);
        Route::get('/{storeId}/logs', [StoreController::class, 'showStoreLogs']);
        Route::put('/{storeId}/template-version', [StoreController::class, 'updateTemplateToLatest']);
    });

    Route::group(['prefix' => 'products'], function () {
        Route::get('/{productId}/inventory', [ProductInventoryController::class, 'productInventoryList']);
        Route::get('/{productId}/medias', [ProductMediaController::class, 'getMediasPerProduct']);
        Route::get('/{productId}/sales', [SalesController::class, 'getProductSales']);
        Route::post('/medias/{mediaId}', [ProductMediaController::class, 'updateMedia']);
        Route::post('/syncInventory', [ZohoController::class, 'syncInventory']);
    });

    Route::group(['prefix' => 'store-users'], function () {
        Route::get('/{userId}/stores', [StoreController::class, 'getStoresPerUser']);
        Route::put('/{userId}/update-password', [StoreUserController::class, 'updatePassword']);
        Route::put('/{userId}/disable-2fa', [StoreUserController::class, 'disableUser2FA']);
    });

    Route::group(['prefix' => 'customers'], function () {
        Route::get('/{customerId}/orders', [CustomerController::class, 'getCustomerOrders']);
        Route::put('/{customerId}/update-status', [CustomerController::class, 'updateStatus']);
        Route::put('/{customerId}/update-password', [CustomerController::class, 'updatePassword']);
        Route::put('/{customerId}/update-address', [CustomerController::class, 'updateAddress']);
        Route::put('/{customerId}/disable-2fa', [CustomerController::class, 'disable2FA']);
    });

    Route::group(['prefix' => 'store-categories'], function () {
        Route::post('/{storeCategoryId}/update-image', [StoreCategoryController::class, 'updateImage']);
        Route::post('/{storeCategoryId}/update-logo', [StoreCategoryController::class, 'updateLogo']);
    });

    Route::group(['prefix' => 'zoho'], function () {
        Route::get('/auth', [ZohoController::class, 'zohoAuth']);
    });

    Route::group(['prefix' => 'payouts'], function () {
        Route::put('/{payoutId}/update-internal-note', [PayoutController::class, 'updateInternalNotes']);
    });

    Route::group(['prefix' => 'notifications'], function () {
        Route::get('/', [NotificationController::class, 'index']);
        Route::get('/total-unread', [NotificationController::class, 'totalUnreadNotification']);
        Route::put('/{notificationId}/read', [NotificationController::class, 'readNotification']);
    });

    Route::get('/all-plans', [PlanController::class, 'plans']);
    Route::get('/all-product-categories', [ProductCategoryController::class, 'index']);
    Route::get('/all-store-categories', [StoreCategoryController::class, 'getAllStoreCategories']);
    Route::get('/all-countries', [CountryController::class, 'getAllCountries']);
    Route::get('/all-faq-categories', [FaqCategoryController::class, 'index']);
    Route::get('/all-blog-categories', [BlogCategoryController::class, 'blogListWithoutPagination']);
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/{storeId}/users', [StoreController::class, 'fetchUsersPerStore']);
    Route::post('/store-templates/{templateId}/update-template-image', [StoreTemplateController::class, 'updateTemplateImage']);
    Route::post('/blogs/{blogId}/update-blog-thumbnail', [BlogController::class, 'updateBlogImage']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::put('/sales', [SalesController::class, 'updateStatus']);
    Route::put('/payout-settings/update-minimum-payout', [PayoutSettingsController::class, 'update']);
});
