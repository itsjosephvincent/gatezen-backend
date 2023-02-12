<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\ForgotPasswordController;

// csrf
Route::get('/auth/sanctum/csrf-cookie', [AuthController::class, 'csrf']);

// Authentication
Route::post('/auth/login', [AuthController::class, 'adminAuthenticationByPassword']);

Route::post('/verify-reset-password', [ForgotPasswordController::class, 'resetPasswordVerification']);
Route::post('/forgot-password', [ForgotPasswordController::class, 'adminForgotPass']);
Route::post('/reset-password', [ForgotPasswordController::class, 'adminResetPass']);
