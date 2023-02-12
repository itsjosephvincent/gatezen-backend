<?php

namespace App\Repositories;

use App\Models\ProductMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Interfaces\Repositories\ProductMediaRepositoryInterface;

class ProductMediaRepository implements ProductMediaRepositoryInterface
{
    public function findMany($payload, $sortField, $sortOrder, $productId)
    {
        return ProductMedia::with('product')
            ->where('product_id', $productId)
            ->filter($payload->all())
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function create($payload)
    {
        $productMedia = new ProductMedia();
        $productMedia->product_id = $payload->product_id;
        $productMedia->name = $payload->name;
        $productMedia->is_featured = $payload->is_featured === 'true' ? true : false;
        $productMedia->media_url = '';
        $productMedia->save();
        $insertMedia = ProductMedia::findOrFail($productMedia->id);
        $insertMedia->addMediaFromRequest('media_url')->toMediaCollection('product_media');
        $insertMedia->media_url = $insertMedia->getMedia('product_media')->last()->getUrl();
        $insertMedia->save();
        return $productMedia->fresh();
    }

    public function findOneById($id)
    {
        return ProductMedia::with('product')->findOrFail($id);
    }

    public function update($payload, $mediaId)
    {
        $productMedia = ProductMedia::findOrFail($mediaId);
        $productMedia->name = $payload->name;
        $productMedia->is_featured = $payload->is_featured === 'true' ? true : false;

        if (isset($payload->media_url)) {
            $media = Media::where('model_id', $productMedia->id)->where('model_type', 'App\Models\ProductMedia')->first();
            if ($media) {
                $media->forceDelete($media->id);
            }
            $productMedia->addMediaFromRequest('media_url')->toMediaCollection('product_media');
            $productMedia->media_url = $productMedia->getMedia('product_media')->last()->getUrl();
        }
        $productMedia->save();
        return $productMedia->fresh();
    }

    public function delete($mediaId)
    {
        $productMedia = ProductMedia::findOrFail($mediaId);
        return $productMedia->forceDelete();
    }
}
