<?php

namespace App\Services;

use Throwable;
use App\Traits\SortingTraits;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\TemplateResource;
use App\Interfaces\Services\StoreTemplateServiceInterface;
use App\Interfaces\Repositories\StoreTemplateRepositoryInterface;

class StoreTemplateService implements StoreTemplateServiceInterface
{
    use SortingTraits;

    private $storeTemplateRepository;

    public function __construct(StoreTemplateRepositoryInterface $storeTemplateRepository)
    {
        $this->storeTemplateRepository = $storeTemplateRepository;
    }

    public function findStoreTemplates($payload)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'desc');

        $orders = $this->storeTemplateRepository->findMany($payload, $sortField, $sortOrder);
        return TemplateResource::collection($orders);
    }

    public function createStoreTemplate($payload)
    {
        $storeTemplate = $this->storeTemplateRepository->create($payload);
        return new TemplateResource($storeTemplate);
    }

    public function findStoreTemplate($storeTemplateId)
    {
        $storeTemplate = $this->storeTemplateRepository->findOneById($storeTemplateId);
        return new TemplateResource($storeTemplate);
    }

    public function updateStoreTemplate($payload, $storeTemplateId)
    {
        DB::beginTransaction();

        try {
            $updateStoreTemplate = $this->storeTemplateRepository->update($payload, $storeTemplateId);
            DB::commit();

            return new TemplateResource($updateStoreTemplate);
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function updateStoreTemplatePhoto($payload, $storeTemplateId)
    {
        DB::beginTransaction();

        try {
            $updateStoreTemplatePhoto = $this->storeTemplateRepository->updatePhoto($payload, $storeTemplateId);
            DB::commit();

            return new TemplateResource($updateStoreTemplatePhoto);
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function findStoreTemplateByStoreid($storeId)
    {
        $template = $this->storeTemplateRepository->findOneByStoreId($storeId);
        return new TemplateResource($template);
    }

    public function findStoreTemplatesByStoreCategoryId($payload, $storeCategoryId)
    {
        $sortField = $this->sortField($payload, 'name');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $template = $this->storeTemplateRepository->findOneByStoreCategoryId($payload, $storeCategoryId, $sortField, $sortOrder);
        return TemplateResource::collection($template);
    }
}
