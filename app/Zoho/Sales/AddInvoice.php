<?php

namespace App\Zoho\Sales;

use App\Repositories\ExternalDataRepository;
use App\Repositories\OrderDetailsRepository;
use App\Zoho\OAuth\Authentication;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Throwable;

class AddInvoice
{
    private $auth;
    private $organizationId;
    private $externalData;
    private $orderDetailsRepository;

    public function __construct()
    {
        $this->auth = new Authentication();
        $this->organizationId = env('ZOHO_ORGANIZATION_ID');
        $this->externalData = new ExternalDataRepository();
        $this->orderDetailsRepository = new OrderDetailsRepository();
    }

    public function index($order)
    {
        try {
            $accessToken = $this->auth->OAuth();
            $customer = $this->externalData->findCustomerExternalData($order->customer_id);
            $orderDetails = $this->orderDetailsRepository->findByOrderId($order->id);

            $lineItems = array();
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

            $result = Http::withHeaders([
                'Content-Type' => 'application/json;charset=UTF-8',
                'Authorization' => 'Zoho-oauthtoken ' . $accessToken
            ])->post('https://inventory.zoho.com/api/v1/invoices?organization_id=' . $this->organizationId, [
                'customer_id' => $customer->external_id,
                'date' => Carbon::now()->format('Y-m-d'),
                'reference_number' => $order->number,
                'line_items' => $lineItems
            ]);

            return json_decode($result, true);
        } catch (Throwable $e) {
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }
}
