<?php

namespace App\Services;

use App\Enum\StoreStatus;
use App\Events\StoreBuilderEvent;
use App\Exceptions\Store\StoreUrlExistsException;
use App\Http\Resources\StoreResource;
use App\Interfaces\Repositories\ServerRepositoryInterface;
use App\Interfaces\Repositories\StoreOwnersRepositoryInterface;
use App\Interfaces\Repositories\StoreRepositoryInterface;
use App\Interfaces\Repositories\StoreServerRepositoryInterface;
use App\Interfaces\Repositories\StoreTemplateRepositoryInterface;
use App\Interfaces\Services\StoreServiceInterface;
use App\Jobs\ProcessStoreBuilderScript;
use App\Jobs\StoreBuilderScriptAction;
use App\Models\Store;
use App\Traits\SortingTraits;
use Illuminate\Support\Facades\DB;
use Throwable;

class StoreService implements StoreServiceInterface
{
    use SortingTraits;

    private $storeRepository;
    private $storeOwnersRepository;
    private $storeServerRepository;
    private $serverRepository;
    private $storeTemplateRepository;

    public function __construct(
        StoreRepositoryInterface $storeRepository,
        StoreOwnersRepositoryInterface $storeOwnersRepository,
        StoreServerRepositoryInterface $storeServerRepository,
        ServerRepositoryInterface $serverRepository,
        StoreTemplateRepositoryInterface $storeTemplateRepository
    ) {
        $this->storeRepository = $storeRepository;
        $this->storeOwnersRepository = $storeOwnersRepository;
        $this->storeServerRepository = $storeServerRepository;
        $this->serverRepository = $serverRepository;
        $this->storeTemplateRepository = $storeTemplateRepository;
    }

    public function findStores($payload)
    {
        $sortField = $this->sortField($payload, 'store_name');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $storeList = $this->storeRepository->findMany($payload, $sortField, $sortOrder);
        return StoreResource::collection($storeList);
    }

    public function findStoresByUserId($payload, $userId)
    {
        $sortField = $this->sortField($payload, 'store_name');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $storeList = $this->storeRepository->findManyByUserId($payload, $sortField, $sortOrder, $userId);
        return StoreResource::collection($storeList);
    }

    public function findStoresByLoggedInUser($payload)
    {
        $userId = auth()->user()->id;
        $sortField = $this->sortField($payload, 'store_name');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $storeList = $this->storeRepository->findManyByUserId($payload, $sortField, $sortOrder, $userId);
        return StoreResource::collection($storeList);
    }

    public function findStore($storeId)
    {
        $store = $this->storeRepository->findOneById($storeId);
        return new StoreResource($store);
    }

    public function createStore($payload)
    {
        $checkStore = Store::where('domain',  $payload->url . '.' . config('store-domain.domain'))->first();

        if ($checkStore) {
            throw new StoreUrlExistsException();
        } else {
            DB::beginTransaction();
            try {
                $server = $this->serverRepository->findMany();
                $template = $this->storeTemplateRepository->findOneByStoreCategoryId($payload->store_category_id);
                $store = $this->storeRepository->create($payload, $template);
                $this->storeOwnersRepository->create($store->id);
                $this->storeServerRepository->create($store->id, $server->id);
                DB::commit();

                StoreBuilderEvent::dispatch($store);

                return new StoreResource($store);
            } catch (Throwable $e) {
                DB::rollBack();
                throw $e;
            }
        }
    }

    public function updateStore($payload, $storeId)
    {

        $store = $this->storeRepository->findOneById($storeId);

        // Detect status update to enable/disable site in nginx
        $currentStatus = $store->status;
        if ($currentStatus !== $payload->status) {
            $action = $payload->status == StoreStatus::Active->value ? StoreBuilderScriptAction::Enable : StoreBuilderScriptAction::Disable;

            ProcessStoreBuilderScript::dispatch(
                $store,
                $action
            )->onQueue('addstore');
        }

        $store = $this->storeRepository->update($payload, $storeId);

        return new StoreResource($store);
    }

    public function updateStoreTemplateToLatest($storeId)
    {
        $store = $this->storeRepository->updateStoreTemplate($storeId);
        return new StoreResource($store);
    }
}
