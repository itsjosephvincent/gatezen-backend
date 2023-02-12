<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\ForgotPasswordController;
use App\Http\Controllers\Api\Customer\BlogController;
use App\Http\Controllers\Api\Customer\ContactUsController;
use App\Http\Controllers\Api\Customer\FaqController;
use App\Http\Controllers\Api\Customer\NewsletterController;
use App\Http\Controllers\Api\Customer\ProductController;
use App\Http\Controllers\Api\Customer\RegistrationController;
use App\Http\Middleware\IdentifyStore;

// csrf  
Route::get('/auth/sanctum/csrf-cookie', [AuthController::class, 'csrf']);

// Contact Us
Route::group([
    'middleware' => \App\Http\Middleware\IdentifyStore::class,
    'prefix' => 'contact-us'
], function () {
    Route::post('/', [ContactUsController::class, 'sendEmail']);
});


// Crm
Route::group([
    'middleware' => \App\Http\Middleware\IdentifyStore::class,
], function () {
    Route::apiResources([
        'faqs' => FaqController::class,
        'blogs' => BlogController::class,
    ]);
});

Route::group([
    'middleware' => \App\Http\Middleware\IdentifyStore::class,
    'prefix' => 'newsletter'
], function () {
    Route::get('/newsletter', [NewsletterController::class, 'getContact']);
    Route::post('/subscribe', [NewsletterController::class, 'subscribe']);
    Route::post('/unsubscribe', [NewsletterController::class, 'unsubscribe']);
});

// Products
Route::group([
    'middleware' => \App\Http\Middleware\IdentifyStore::class
], function () {
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/{slug}', [ProductController::class, 'showBySlug']);
    Route::get('/faqs-by-store-category', [FaqController::class, 'showByCategory']);
    Route::post('/email-verification', [RegistrationController::class, 'emailVerify']);
    Route::post('/verify-reset-password', [ForgotPasswordController::class, 'resetPasswordVerification']);
    Route::post('/forgot-password', [ForgotPasswordController::class, 'customerForgotPass']);
    Route::post('/reset-password', [ForgotPasswordController::class, 'customerResetPass']);
});

// Authentication
Route::group([
    'middleware' => \App\Http\Middleware\IdentifyStore::class,
    'prefix' => 'auth'
], function () {
    Route::post('/login', [AuthController::class, 'customerAuthenticationByPassword']);
    Route::post('/register', [RegistrationController::class, 'index']);
});
