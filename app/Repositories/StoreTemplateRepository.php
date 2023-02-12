<?php

namespace App\Repositories;

use App\Models\Template;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Interfaces\Repositories\StoreTemplateRepositoryInterface;

class StoreTemplateRepository implements StoreTemplateRepositoryInterface
{
    public function findMany($payload, $sortField, $sortOrder)
    {
        $searchStoreCategory = $payload->category;
        return Template::with([
            'store_category',
            'stores',
        ])->filter($payload->all())
            ->when($searchStoreCategory !== null, function ($query) use ($searchStoreCategory) {
                $query->whereHas(
                    'store_category',
                    function ($query) use ($searchStoreCategory) {
                        $query->where('name', 'like', $searchStoreCategory . '%');
                    }
                );
            })
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function findOneById(int $storeTemplateId)
    {
        return Template::with(['store_category'])->findOrFail($storeTemplateId);
    }

    public function create($payload)
    {
        $storeTemplate = new Template();
        $storeTemplate->store_category_id = $payload->store_category_id;
        $storeTemplate->name = $payload->name;
        $storeTemplate->description = $payload->description;
        $storeTemplate->is_active = $payload->is_active;
        $storeTemplate->repo_url = $payload->repo_url;
        $storeTemplate->version = $payload->version;
        $storeTemplate->save();
        return $storeTemplate->fresh();
    }

    public function update($payload, $storeTemplateId)
    {
        $storeTemplate = Template::findOrFail($storeTemplateId);
        $storeTemplate->store_category_id = $payload->store_category_id;
        $storeTemplate->name = $payload->name;
        $storeTemplate->description = $payload->description;
        $storeTemplate->is_active = $payload->is_active;
        $storeTemplate->repo_url = $payload->repo_url;
        $storeTemplate->version = $payload->version;
        $storeTemplate->save();
        return $storeTemplate->fresh('store_category');
    }

    public function updatePhoto($payload, $storeTemplateId)
    {
        $storeTemplate = Template::findOrFail($storeTemplateId);
        $media = Media::where('model_id', $storeTemplate->id)->where('model_type', 'App\Models\Template')->first();
        if ($media) {
            $media->forceDelete($media->id);
        }
        $storeTemplate->addMediaFromRequest('image_url')->toMediaCollection('template_media');
        $storeTemplate->image_url = $storeTemplate->getMedia('template_media')->last()->getUrl();
        $storeTemplate->save();
        return $storeTemplate->fresh('store_category');
    }

    public function findOneByStoreId($storeId)
    {
        return Template::whereHas('stores', function ($query) use ($storeId) {
            return $query->where('id', $storeId);
        })->with('store_category')->first();
    }

    public function findOneByStoreCategoryId($storeCategoryId)
    {
        return Template::where('store_category_id', $storeCategoryId)->first();
    }
}
