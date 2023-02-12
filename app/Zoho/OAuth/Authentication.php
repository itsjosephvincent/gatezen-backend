<?php

namespace App\Zoho\OAuth;

use Illuminate\Support\Facades\Http;
use Throwable;

class Authentication
{
    private $refreshToken;
    private $clientId;
    private $clientSecret;

    public function __construct()
    {
        $this->refreshToken = env('ZOHO_REFRESH_TOKEN');
        $this->clientId = env('ZOHO_CLIENT_ID');
        $this->clientSecret = env('ZOHO_CLIENT_SECRET');
    }

    public function OAuth()
    {
        try {
            $response = Http::asForm()->post('https://accounts.zoho.com/oauth/v2/token', [
                'refresh_token' => $this->refreshToken,
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
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
