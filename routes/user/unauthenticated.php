<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\ForgotPasswordController;
use App\Http\Controllers\Api\User\SubscriptionController;

// csrf
Route::get('/auth/sanctum/csrf-cookie', [AuthController::class, 'csrf']);

Route::apiResources([
    'subscriptions' => SubscriptionController::class
]);

// Authentication
Route::post('/auth/login', [AuthController::class, 'userAuthenticationByPassword']);

Route::post('/verify-reset-password', [ForgotPasswordController::class, 'resetPasswordVerification']);
Route::post('/forgot-password', [ForgotPasswordController::class, 'userForgotPass']);
Route::post('/reset-password', [ForgotPasswordController::class, 'userResetPass']);
