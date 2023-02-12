<?php

namespace App\Interfaces\Services;

interface StoreTemplateServiceInterface
{
    public function findStoreTemplates(object $payload);
    public function findStoreTemplate(int $storeTemplateId);
    public function createStoreTemplate(object $payload);
    public function updateStoreTemplate(object $payload, int $storeTemplateId);
    public function updateStoreTemplatePhoto(object $payload, int $storeTemplateId);
    public function findStoreTemplateByStoreid(int $storeId);
    public function findStoreTemplatesByStoreCategoryId(object $payload, int $storeCategoryId);
}
