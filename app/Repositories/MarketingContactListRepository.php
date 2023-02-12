<?php

namespace App\Repositories;

use App\Interfaces\Repositories\MarketingContactListRepositoryInterface;
use App\Models\MarketingContactList;

class MarketingContactListRepository implements MarketingContactListRepositoryInterface
{
    public function findMany($payload, $sortField, $sortOrder)
    {
        return MarketingContactList::orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function findForStore($storeId, $provider, $channel, $type)
    {
        return MarketingContactList::where('store_id', $storeId)
            ->where('provider', $provider)
            ->where('channel', $channel)
            ->where('type', $type)
            ->first();
    }

    public function findForStoreCategory($storeCategoryId, $provider, $channel, $type)
    {
        return MarketingContactList::where('store_category_id', $storeCategoryId)
            ->where('provider', $provider)
            ->where('channel', $channel)
            ->where('type', $type)
            ->first();
    }
}
