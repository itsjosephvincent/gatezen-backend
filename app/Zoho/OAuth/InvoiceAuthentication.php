<?php

namespace App\Zoho\OAuth;

use Illuminate\Support\Facades\Http;
use Throwable;

class InvoiceAuthentication
{
    public function OAuth()
    {
        try {
            $response = Http::asForm()->post('https://accounts.zoho.com/oauth/v2/token', [
                'refresh_token' => env('ZOHO_INVOICE_REFRESH_TOKEN'),
                'client_id' => env('ZOHO_CLIENT_ID'),
                'client_secret' => env('ZOHO_CLIENT_SECRET'),
                'redirect_url' => env('APP_URL'),
                'grant_type' => 'refresh_token'
            ]);

            $token = json_decode($response);

            return $token->access_token;
        } catch (Throwable $e) {
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }
}
