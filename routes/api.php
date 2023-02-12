<?php

use App\Http\Controllers\Api\TheGateIndex\TgiController;
use App\Http\Middleware\VerifyTgiToken;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'admin'], function () {
    require 'admin/authenticated.php';
    require 'admin/unauthenticated.php';
});

Route::group(['prefix' => 'user'], function () {
    // Authentication
    require 'user/authenticated.php';
    require 'user/unauthenticated.php';
});

Route::group(['prefix' => 'customer'], function () {
    require 'customer/authenticated.php';
    require 'customer/unauthenticated.php';
});

Route::group([
    'middleware' => VerifyTgiToken::class,
    'prefix' => 'auth'
], function () {
    Route::post('/check_tgi', [TgiController::class, 'showTgiUser']);
    Route::post('/get_user_balances', [TgiController::class, 'showTgiUserBalance']);
    Route::post('/register_tgi', [TgiController::class, 'store']);
});

Route::post('/auth/login_from_tgi', [TgiController::class, 'tgiAuthentication']);

Route::webhooks('/zoho/webhooks');
