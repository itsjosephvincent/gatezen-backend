<?php

namespace App\Services;

use App\Http\Resources\FaqCategoryResource;
use App\Interfaces\Repositories\FaqCategoryRepositoryInterface;
use App\Interfaces\Services\FaqCategoryServiceInterface;

class FaqCategoryService implements FaqCategoryServiceInterface
{
    private $faqCategoryRepository;

    public function __construct(FaqCategoryRepositoryInterface $faqCategoryRepository)
    {
        $this->faqCategoryRepository = $faqCategoryRepository;
    }

    public function findFaqs()
    {
        $faqList = $this->faqCategoryRepository->findMany();

        return FaqCategoryResource::collection($faqList);
    }
}
