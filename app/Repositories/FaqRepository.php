<?php

namespace App\Repositories;

use App\Interfaces\Repositories\FaqRepositoryInterface;
use App\Models\Faq;

class FaqRepository implements FaqRepositoryInterface
{
    public function findMany($payload, $sortField, $sortOrder)
    {
        $searchStoreCategory = $payload->store_category;
        $searchFaqCategory = $payload->faq_category;
        return Faq::with([
            'store_category',
            'faq_category'
        ])->filter($payload->all())
            ->when($searchStoreCategory !== null, function ($query) use ($searchStoreCategory) {
                $query->whereHas(
                    'store_category',
                    function ($query) use ($searchStoreCategory) {
                        $query->where('name', 'like', $searchStoreCategory . '%');
                    }
                );
            })
            ->when($searchFaqCategory !== null, function ($query) use ($searchFaqCategory) {
                $query->whereHas(
                    'faq_category',
                    function ($query) use ($searchFaqCategory) {
                        $query->where('name', 'like', $searchFaqCategory . '%');
                    }
                );
            })
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function create($payload)
    {
        $faq = new Faq();
        $faq->title = $payload->title;
        $faq->content = $payload->content;
        $faq->store_category_id = $payload->store_category_id;
        $faq->faq_category_id = $payload->faq_category_id;
        $faq->save();

        return $faq->fresh();
    }

    public function findOneById($faqId)
    {
        return Faq::with([
            'store_category',
            'faq_category'
        ])->findOrFail($faqId);
    }

    public function findOneByCategoryId($storeCategoryId)
    {
        return Faq::with([
            'store_category',
            'faq_category'
        ])->where('store_category_id', $storeCategoryId)->get();
    }

    public function update($payload, $faqId)
    {
        $faq = Faq::findOrFail($faqId);
        $faq->title = $payload->title;
        $faq->content = $payload->content;
        $faq->store_category_id = $payload->store_category_id;
        $faq->faq_category_id = $payload->faq_category_id;
        $faq->save();

        return $faq->fresh();
    }

    public function delete($faqId)
    {
        return Faq::findOrFail($faqId)->delete();
    }
}
