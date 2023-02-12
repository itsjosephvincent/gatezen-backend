<?php

namespace App\Services;

use App\Http\Resources\FaqResource;
use App\Interfaces\Repositories\FaqRepositoryInterface;
use App\Interfaces\Repositories\StoreCategoryRepositoryInterface;
use App\Interfaces\Services\FaqServiceInterface;
use App\Traits\SortingTraits;

class FaqService implements FaqServiceInterface
{
    use SortingTraits;

    private $faqRepository;

    public function __construct(FaqRepositoryInterface $faqRepository)
    {
        $this->faqRepository = $faqRepository;
    }

    public function findFaqs($payload)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $faqList = $this->faqRepository->findMany($payload, $sortField, $sortOrder);
        return FaqResource::collection($faqList);
    }

    public function createFaq($payload)
    {
        $faq = $this->faqRepository->create($payload);

        return new FaqResource($faq);
    }

    public function findFaq($faqId)
    {
        $faq = $this->faqRepository->findOneById($faqId);

        return new FaqResource($faq);
    }

    public function findFaqByCategory($store)
    {
        $faq = $this->faqRepository->findOneByCategoryId($store->store_category->id);

        return FaqResource::collection($faq);
    }

    public function updateFaq($payload, $faqId)
    {
        $faq = $this->faqRepository->update($payload, $faqId);

        return new FaqResource($faq);
    }

    public function deleteFaq($faqId)
    {
        $this->faqRepository->delete($faqId);
    }
}
