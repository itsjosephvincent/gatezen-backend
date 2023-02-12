<?php

namespace App\Repositories;

use App\Models\StoreCategory;
use App\Interfaces\Repositories\StoreCategoryRepositoryInterface;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class StoreCategoryRepository implements StoreCategoryRepositoryInterface
{
    public function findMany($payload, $sortField, $sortOrder)
    {
        return StoreCategory::with([
            'templates',
            'stores',
            'products'
        ])->filter($payload->all())
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function findManyWithNoPagination()
    {
        return StoreCategory::sortByStatus()->get();
    }

    public function create($payload)
    {
        $storeCategory = new StoreCategory();
        $storeCategory->name = $payload->name;
        $storeCategory->description = $payload->description;
        $storeCategory->status = $payload->status;
        $storeCategory->save();

        return $storeCategory->fresh();
    }

    public function findOneById($storeCategoryId)
    {
        return StoreCategory::with([
            'templates',
        ])->findOrFail($storeCategoryId);
    }

    public function findOneByName($storeCategory)
    {
        return StoreCategory::where('name', $storeCategory)->first();
    }

    public function update($payload, $storeCategoryId)
    {
        $storeCategory = StoreCategory::findOrFail($storeCategoryId);
        $storeCategory->name = $payload->name;
        $storeCategory->description = $payload->description;
        $storeCategory->status = $payload->status;
        $storeCategory->save();
        return $storeCategory->fresh();
    }

    public function updateImage($payload, $storeCategoryId)
    {
        $storeCategory = StoreCategory::findOrFail($storeCategoryId);
        $media = Media::where('model_id', $storeCategory->id)->where('model_type', 'App\Models\StoreCategory')->first();
        if ($media) {
            $media->forceDelete($media->id);
        }
        $storeCategory->addMediaFromRequest('img_url')->toMediaCollection('store_category_media');
        $storeCategory->img_url = $storeCategory->getMedia('store_category_media')->last()->getUrl();
        $storeCategory->save();
        return $storeCategory->fresh();
    }

    public function updateLogo($payload, $storeCategoryId)
    {
        $storeCategory = StoreCategory::findOrFail($storeCategoryId);
        $media = Media::where('model_id', $storeCategory->id)->where('model_type', 'App\Models\StoreCategory')->first();
        if ($media) {
            $media->forceDelete($media->id);
        }
        $storeCategory->addMediaFromRequest('logo_url')->toMediaCollection('store_category_media');
        $storeCategory->logo_url = $storeCategory->getMedia('store_category_media')->last()->getUrl();
        $storeCategory->save();
        return $storeCategory->fresh();
    }
}
