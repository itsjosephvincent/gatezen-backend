<?php

use Illuminate\Support\Facades\Route;
use PragmaRX\Google2FAQRCode\Google2FA as google2FAImageGenerator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('emails.verification.email-verification');
});

Route::get('/google-2fa-generate', function () {
    $google2fa = new google2FAImageGenerator();

    $inlineUrl = $google2fa->getQRCodeInline(
        env('APP_NAME'),
        'kklocko20220725120039@kemmer.net',
        'XHMZZVTAELATNF2XHG5DCQBQ4JDD5667',
    );
    return $inlineUrl;
});
