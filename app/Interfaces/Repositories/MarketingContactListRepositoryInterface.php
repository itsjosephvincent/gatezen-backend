<?php

namespace App\Interfaces\Repositories;

interface MarketingContactListRepositoryInterface
{
    public function findMany(object $payload, string $sortField, string $sortOrder);
    public function findForStore(int $storeId, string $provider, string $channel, string $type);
    public function findForStoreCategory(int $storeCategoryId, string $provider, string $channel, string $type);
}
