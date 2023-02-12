<?php

namespace App\Zoho\Inventory;

use App\Zoho\OAuth\Authentication;
use Illuminate\Support\Facades\Http;
use Throwable;

class AddItem
{

    private $organizationId;
    private $token;

    public function __construct()
    {
        $this->token = new Authentication();
        $this->organizationId = env('ZOHO_ORGANIZATION_ID');
    }

    public function index($product)
    {
        try {
            $accessToken = $this->token->OAuth();

            $result = Http::withHeaders([
                'Content-Type' => 'application/json;charset=UTF-8',
                'Authorization' => 'Zoho-oauthtoken ' . $accessToken
            ])->post('https://inventory.zoho.com/api/v1/items?organization_id=' . $this->organizationId, [
                'name' => $product->name,
                'rate' => $product->price,
                'description' => $product->description
            ]);

            $data = json_decode($result, true);

            return $data;
        } catch (Throwable $e) {
            throw $e;
        }
    }
}
