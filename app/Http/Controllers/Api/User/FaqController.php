<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\FaqStoreRequest;
use App\Interfaces\Services\FaqServiceInterface;
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

    public function store(FaqStoreRequest $request): JsonResponse
    {
        $payload = (object) $request->only([
            'title',
            'content',
            'store_category_id',
            'faq_category_id'
        ]);

        return $this->faqService->createFaq($payload)->response();
    }

    public function show($faqId): JsonResponse
    {
        return $this->faqService->findFaq($faqId)->response();
    }

    public function update(FaqStoreRequest $request, $faqId): JsonResponse
    {
        $payload = (object) $request->only([
            'title',
            'content',
            'store_category_id',
            'faq_category_id'
        ]);

        return $this->faqService->updateFaq($payload, $faqId)->response();
    }

    public function destroy($faqId)
    {
        $this->faqService->deleteFaq($faqId);
    }
}
