<?php

namespace App\Zoho\Sales;

use App\Repositories\ExternalDataRepository;
use App\Zoho\OAuth\Authentication;
use Illuminate\Support\Facades\Http;
use Throwable;

class GetInvoice
{
    private $auth;
    private $organizationId;
    private $externalData;

    public function __construct()
    {
        $this->auth = new Authentication();
        $this->organizationId = env('ZOHO_ORGANIZATION_ID');
        $this->externalData = new ExternalDataRepository();
    }

    public function index()
    {
        try {
            $accessToken = $this->auth->OAuth();

            $result = Http::withHeaders([
                'Authorization' => 'Zoho-oauthtoken' . $accessToken
            ])->get('https://inventory.zoho.com/api/v1/invoices?organization_id=' . $this->organizationId);

            return json_decode($result, true);
        } catch (Throwable $e) {
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }
}
