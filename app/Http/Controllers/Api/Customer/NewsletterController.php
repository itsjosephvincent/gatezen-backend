<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetContactRequest;
use App\Http\Requests\SubscribeStoreRequest;
use App\Http\Requests\UnsubscribeRequest;
use App\Interfaces\Services\NewsletterServiceInterface;
use App\Models\Store;
use Illuminate\Http\JsonResponse;

class NewsletterController extends Controller
{

    private $newsletterService;

    public function __construct(NewsletterServiceInterface $newsletterService)
    {
        $this->newsletterService = $newsletterService;
    }

    public function subscribe(SubscribeStoreRequest $request, Store $store): JsonResponse
    {
        return $this->newsletterService->subscribeContact($request->email, $store)->response();
    }

    public function unsubscribe(UnsubscribeRequest $request, Store $store): JsonResponse
    {
        return $this->newsletterService->unsubscribeContact($request->email, $store)->response();
    }

    public function getContact(GetContactRequest $request): JsonResponse
    {
        return $this->newsletterService->findContact($request->email)->response();
    }
}
