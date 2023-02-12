<?php

namespace App\Services;

use Throwable;
use App\Traits\SortingTraits;
use App\Traits\Google2FATraits;
use App\Traits\EncryptionTraits;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\AdminResource;
use App\Interfaces\Services\AdminServiceInterface;
use App\Interfaces\Repositories\AdminRepositoryInterface;

class AdminService implements AdminServiceInterface
{
    use EncryptionTraits, Google2FATraits, SortingTraits;

    private $adminRepository;

    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function findAdmins(object $payload)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $logList = $this->adminRepository->findMany($payload, $sortField, $sortOrder);
        return AdminResource::collection($logList);
    }

    public function findAdmin($adminId)
    {
        $admin = $this->adminRepository->findOneById($adminId);
        return new AdminResource($admin);
    }

    public function createAdmin($payload)
    {
        DB::beginTransaction();

        try {
            $googleKey = $this->generateGoogleSecretKey();
            $encryptedGoogleKey = $this->encrypt($googleKey);
            $saveAdmin = $this->adminRepository->create($payload, $encryptedGoogleKey);
            DB::commit();

            return new AdminResource($saveAdmin);
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function updateAdmin($payload, $adminId)
    {
        DB::beginTransaction();

        try {
            $updateAdmin = $this->adminRepository->update($payload, $adminId);
            DB::commit();

            return new AdminResource($updateAdmin);
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function updateAdminStatus($payload, $adminId)
    {
        DB::beginTransaction();

        try {
            $updateAdmin = $this->adminRepository->updateStatus($payload, $adminId);
            DB::commit();

            return new AdminResource($updateAdmin);
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function updateAdminPassword($payload, $adminId)
    {
        DB::beginTransaction();

        try {
            $updateAdmin = $this->adminRepository->updatePassword($payload, $adminId);
            DB::commit();

            return new AdminResource($updateAdmin);
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
}
