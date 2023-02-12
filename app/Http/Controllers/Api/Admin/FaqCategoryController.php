<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Services\FaqCategoryServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FaqCategoryController extends Controller
{
    private $faqCategoryService;

    public function __construct(FaqCategoryServiceInterface $faqCategoryService)
    {
        $this->faqCategoryService = $faqCategoryService;
    }

    public function index(): JsonResponse
    {
        return $this->faqCategoryService->findFaqs()->response();
    }
}
