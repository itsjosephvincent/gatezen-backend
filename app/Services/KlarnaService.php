<?php

namespace App\Services;

use App\Interfaces\Repositories\ProductRepositoryInterface;
use App\Interfaces\Repositories\VatRepositoryInterface;
use App\Interfaces\Services\KlarnaServiceInterface;
use Illuminate\Support\Facades\Http;
use Throwable;

class KlarnaService implements KlarnaServiceInterface
{
    private $productRepository;
    private $vatRepository;

    public function __construct(ProductRepositoryInterface $productRepository, VatRepositoryInterface $vatRepository)
    {
        $this->productRepository = $productRepository;
        $this->vatRepository = $vatRepository;
    }

    public function makePayment($lineitems, $payload, $shippingMethod, $shippingKey, $shippingFee)
    {
        try {
            $orderAmount = [];
            $orderLines = [];
            $orderTaxAmount = [];
            for ($i = 0; $i < count($lineitems); $i++) {
                $product = $this->productRepository->findOneById($lineitems[$i]['product']['product_data']['id']);
                $vat = $this->vatRepository->findById($product->vat_id);
                array_push($orderLines, [
                    'name' => $lineitems[$i]['product']['product_data']['name'],
                    'quantity' => $lineitems[$i]['quantity'],
                    'quantity_unit' => 'pcs',
                    'unit_price' => $lineitems[$i]['product']['unit_price'],
                    'tax_rate' => $vat->percentage * 100,
                    'total_amount' => $lineitems[$i]['product']['unit_price'] * $lineitems[$i]['quantity'],
                    'total_tax_amount' => ($lineitems[$i]['product']['unit_price'] * $lineitems[$i]['quantity']) * (($vat->percentage * 100) / 100)
                ]);
                $orderAmount[] = $lineitems[$i]['product']['unit_price'] * $lineitems[$i]['quantity'];
                $orderTaxAmount[] = ($lineitems[$i]['product']['unit_price'] * $lineitems[$i]['quantity']) * (($vat->percentage * 100) / 100);
            }

            $result = Http::withBasicAuth(env('KLARNA_API_UID'), env('KLARNA_API_PASS'))
                ->withHeaders([
                    'Content-type' => 'application/json'
                ])->post('https://api.playground.klarna.com/checkout/v3/orders', [
                    'purchase_country' => 'US',
                    'purchase_currency' => 'USD',
                    'locale' => 'en-US',
                    'order_amount' => array_sum($orderAmount),
                    'order_tax_amount' => array_sum($orderTaxAmount),
                    'order_lines' => $orderLines,
                    'merchant_urls' => [
                        'terms' => $payload->terms_url,
                        'checkout' => $payload->cancel_url,
                        'confirmation' => $payload->success_url,
                        'push' => 'https://www.google.com',
                    ],
                    'shipping_options' => [
                        [
                            'id' => $shippingKey,
                            'name' => $shippingMethod,
                            'price' => round($shippingFee),
                            'tax_amount' => 0,
                            'tax_rate' => 0
                        ]
                    ]
                ]);

            $data = json_decode($result, true);

            return $data;
        } catch (Throwable $e) {
            throw $e;
        }
    }

    public function readOrder($checkOutSessionId)
    {
        try {

            $result = Http::withBasicAuth(env('KLARNA_API_UID'), env('KLARNA_API_PASS'))
                ->withHeaders([
                    'Content-type' => 'application/json'
                ])->get('https://api.playground.klarna.com/checkout/v3/orders/' . $checkOutSessionId);

            $data = json_decode($result, true);

            return $data;
        } catch (Throwable $e) {
            throw $e;
        }
    }
}
