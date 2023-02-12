<?php

namespace App\Zoho\Customer;

use App\Zoho\OAuth\Authentication;
use Illuminate\Support\Facades\Http;
use Throwable;

class AddNewCustomer
{
    private $organizationId;
    private $token;

    public function __construct()
    {
        $this->token = new Authentication();
        $this->organizationId = env('ZOHO_ORGANIZATION_ID');
    }

    public function index($customer)
    {
        try {
            $accessToken = $this->token->OAuth();

            $response = Http::withHeaders([
                'Content-Type' => 'application/json;charset=UTF-8',
                'Authorization' => 'Zoho-oauthtoken ' . $accessToken
            ])->post('https://inventory.zoho.com/api/v1/contacts/?organization_id=' . $this->organizationId, [
                'contact_name' => $customer->first_name . ' ' . $customer->last_name,
                'company_name' => $customer->company_name,
                'contact_type' => 'customer',
                'contact_persons' => [
                    [
                        'first_name' => $customer->first_name,
                        'last_name' => $customer->last_name,
                        'email' => $customer->email,
                        'phone' => $customer->mobile,
                        'mobile' => $customer->mobile,
                        'is_primary_contact' => true
                    ]
                ]
            ]);

            $data = json_decode($response, true);

            return $data;
        } catch (Throwable $e) {
            throw $e;
        }
    }
}
