<?php

namespace App\Zoho\Inventory;

use App\Zoho\OAuth\Authentication;
use Illuminate\Support\Facades\Http;
use Throwable;

class GetAllItems
{

    private $organizationId;
    private $token;

    public function __construct()
    {
        $this->token = new Authentication();
        $this->organizationId = env('ZOHO_ORGANIZATION_ID');
    }

    public function index()
    {
        try {
            $accessToken = $this->token->OAuth();

            // $itemList = Http::withHeaders([
            //     'Content-Type' => 'application/json;charset=UTF-8',
            //     'Authorization' => 'Zoho-oauthtoken ' . $accessToken
            // ])->get('https://inventory.zoho.com/api/v1/items?organization_id=' . $this->organizationId);

            $itemList = Http::withHeaders([
                'Authorization' => 'Zoho-oauthtoken ' . $accessToken
            ])->get('https://inventory.zoho.com/api/v1/inventoryadjustments?organization_id=' . $this->organizationId);

            return json_decode($itemList);
        } catch (Throwable $e) {
            throw $e;
        }
    }
}
