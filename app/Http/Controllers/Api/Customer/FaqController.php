<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\FaqRequest;
use App\Interfaces\Services\FaqServiceInterface;
use App\Models\Store;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    private $faqService;

    public function __construct(FaqServiceInterface $faqService)
    {
        $this->faqService = $faqService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->faqService->findFaqs($request)->response();
    }

    public function show($faqId): JsonResponse
    {
        return $this->faqService->findFaq($faqId)->response();
    }

    public function showByCategory(Store $store): JsonResponse
    {
        return $this->faqService->findFaqByCategory($store)->response();
    }
}
