<?php

namespace App\Zoho\Sales;

use App\Repositories\ExternalDataRepository;
use App\Repositories\OrderDetailsRepository;
use App\Repositories\ProductRepository;
use App\Zoho\OAuth\Authentication;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Throwable;

class AddSalesOrder
{
    private $auth;
    private $externalData;
    private $organizationId;
    private $orderDetailsRepository;

    public function __construct()
    {
        $this->auth = new Authentication();
        $this->externalData = new ExternalDataRepository();
        $this->organizationId = env('ZOHO_ORGANIZATION_ID');
        $this->orderDetailsRepository = new OrderDetailsRepository();
    }

    public function index($order)
    {
        try {
            $accessToken = $this->auth->OAuth();
            $customer = $this->externalData->findCustomerExternalData($order->customer_id);
            $orderDetails = $this->orderDetailsRepository->findByOrderId($order->id);

            $lineItems = [];
            foreach ($orderDetails as $orderDetail) {
                $external = $this->externalData->findProductExternalData($orderDetail->product_id);
                array_push($lineItems, [
                    'item_id' => $external->external_id,
                    'name' => $orderDetail->name,
                    'description' => $orderDetail->description,
                    'rate' => $orderDetail->price,
                    'quantity' => $orderDetail->quantity,
                    'unit' => 'qty',
                    'item_total' => $orderDetail->price * $orderDetail->quantity
                ]);
            }

            $sales = Http::withHeaders([
                'Content-Type' => 'application/json;charset=UTF-8',
                'Authorization' => 'Zoho-oauthtoken ' . $accessToken
            ])->post('https://inventory.zoho.com/api/v1/salesorders?organization_id=' . $this->organizationId, [
                'customer_id' => $customer->external_id,
                'date' => Carbon::now()->format('Y-m-d'),
                'reference_number' => $order->number,
                'line_items' => $lineItems
            ]);

            return json_decode($sales, true);
        } catch (Throwable $e) {
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }
}
