<?php

namespace App\Zoho\Inventory;

use App\Zoho\OAuth\Authentication;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Throwable;

class ItemAdjustment
{
    private $organizationId;
    private $auth;

    public function __construct()
    {
        $this->organizationId = env('ZOHO_ORGANIZATION_ID');
        $this->auth = new Authentication;
    }
    public function index($externalId, $orderDetail)
    {
        try {
            $accessToken = $this->auth->OAuth();
            $newQuantity = -1 * abs($orderDetail->quantity);

            $response = Http::withHeaders([
                'Content-Type' => 'application/json;charset=UTF-8',
                'Authorization' => 'Zoho-oauthtoken ' . $accessToken
            ])->post('https://inventory.zoho.com/api/v1/inventoryadjustments?organization_id=' . $this->organizationId, [
                'date' => Carbon::now()->format('Y-m-d'),
                'reason' => 'Inventory Revaluation',
                'adjustment_type' => 'quantity',
                'line_items' => [
                    'item_id' => $externalId,
                    'quantity_adjusted' => $newQuantity,
                    'unit' => 'qty'
                ]
            ]);

            $data = json_decode($response);

            return $data;
        } catch (Throwable $e) {
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }
}
