<?php

namespace App\Repositories;

use App\Enum\StoreStatus;
use App\Interfaces\Repositories\StoreOwnersRepositoryInterface;
use App\Interfaces\Repositories\StoreRepositoryInterface;
use App\Models\Store;
use App\Models\Template;

class StoreRepository implements StoreRepositoryInterface
{
    private $storeOwnerRepository;

    public function __construct(StoreOwnersRepositoryInterface $storeOwnerRepository)
    {
        $this->storeOwnerRepository = $storeOwnerRepository;
    }

    public function findMany($payload, $sortField, $sortOrder)
    {
        $searchStoreOwner = $payload->owner;
        $searchStoreCategory = $payload->category;
        $searchTemplate = $payload->template;
        return Store::filter($payload->all())
            ->with([
                'store_owner',
                'store_owner.user',
                'store_category',
                'template'
            ])->when($searchStoreOwner !== null, function ($query) use ($searchStoreOwner) {
                $query->whereHas(
                    'store_owner.user',
                    function ($query) use ($searchStoreOwner) {
                        $query->where('first_name', 'like', $searchStoreOwner . '%')
                            ->orWhere('last_name', 'like', $searchStoreOwner . '%');
                    }
                );
            })->when($searchStoreCategory !== null, function ($query) use ($searchStoreCategory) {
                $query->whereHas(
                    'store_category',
                    function ($query) use ($searchStoreCategory) {
                        $query->where('name', 'like', $searchStoreCategory . '%');
                    }
                );
            })->when($searchTemplate !== null, function ($query) use ($searchTemplate) {
                $query->whereHas(
                    'template',
                    function ($query) use ($searchTemplate) {
                        $query->where('name', 'like', $searchTemplate . '%');
                    }
                );
            })->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function findManyByUserId($payload, $sortField, $sortOrder, $userId)
    {
        $searchStoreCategory = $payload->category;
        $searchTemplate = $payload->template;

        $stores = $this->storeOwnerRepository->findStoresByUserId($userId);

        return Store::whereIn('id', $stores)->with([
            'template',
            'store_category'
        ])->filter($payload->all())
            ->when($searchStoreCategory !== null, function ($query) use ($searchStoreCategory) {
                $query->whereHas(
                    'store_category',
                    function ($query) use ($searchStoreCategory) {
                        $query->where('name', 'like', $searchStoreCategory . '%');
                    }
                );
            })->when($searchTemplate !== null, function ($query) use ($searchTemplate) {
                $query->whereHas(
                    'template',
                    function ($query) use ($searchTemplate) {
                        $query->where('name', 'like', $searchTemplate . '%');
                    }
                );
            })
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function findOneByStoreUrl($storeUrl)
    {
        return Store::where('url', $storeUrl)->first();
    }

    public function findOneById($storeId)
    {
        return Store::with([
            'store_owner',
            'store_owner.user',
            'store_category',
            'template'
        ])->findOrFail($storeId);
    }

    public function create($payload, $template)
    {

        $store = new Store();
        $store->template_id = $template->id;
        $store->store_category_id = $payload->store_category_id;
        $store->url = 'https://' . str_replace(' ', '-', strtolower($payload->url)) . '.' . config('store-domain.domain');
        $store->domain = str_replace(' ', '-', strtolower($payload->url)) . '.' . config('store-domain.domain');
        $store->store_name = $payload->store_name;
        $store->is_private = isset($payload->is_private) ? true : false;
        $store->is_wholesaler = isset($payload->is_wholesaler) ? true : false;
        $store->theme_color = isset($payload->theme_color) ? $payload->theme_color : null;
        $store->text_color = isset($payload->text_color) ? $payload->text_color : null;
        $store->template_version = $template->version;
        $store->save();
        return $store->fresh();
    }

    public function update($payload, $storeId)
    {
        $store = Store::findOrFail($storeId);
        $store->store_name = $payload->store_name;
        $store->store_category_id = isset($payload->store_category_id) ? $payload->store_category_id : $store->store_category_id;
        $store->status = $payload->status;
        $store->is_private = isset($payload->is_private) ? $payload->is_private : $store->is_private;
        $store->is_wholesaler = isset($payload->is_wholesaler) ? $payload->is_wholesaler : $store->is_wholesaler;
        $store->url = isset($payload->url) ? $payload->url : $store->url;
        $store->domain = isset($payload->domain) ? $payload->domain : $store->domain;
        $store->save();
        return $store->fresh();
    }

    public function updateStoreTemplate($storeId)
    {
        $store = Store::with(['template'])->findOrFail($storeId);
        $template = Template::findOrFail($store->template_id);
        $store->template_version = $template->version;
        $store->save();
        return $store->fresh(['template']);
    }

    public function findManyCount()
    {
        return Store::all()->count();
    }
}
