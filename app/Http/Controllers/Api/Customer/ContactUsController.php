<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\SendContactUsEmaiLRequest;
use App\Interfaces\Services\ContactUsServiceInterface;
use App\Models\Store;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    private $contactUsService;

    public function __construct(ContactUsServiceInterface $contactUsService)
    {
        $this->contactUsService = $contactUsService;
    }

    public function sendEmail(SendContactUsEmaiLRequest $request, Store $store)
    {
        $payload = (object) $request->only([
            'name',
            'email',
            'subject',
            'message'
        ]);

        return $this->contactUsService->sendContactUsEmail($payload, $store);
    }
}
