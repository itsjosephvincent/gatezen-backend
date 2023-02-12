<?php

namespace App\Services;

use App\Http\Resources\AdminDashboardResource;
use App\Http\Resources\UserDashboardResource;
use App\Interfaces\Repositories\AdminRepositoryInterface;
use App\Interfaces\Repositories\CommissionRepositoryInterface;
use App\Interfaces\Repositories\CustomerRepositoryInterface;
use App\Interfaces\Repositories\OrderDetailsRepositoryInterface;
use App\Interfaces\Repositories\OrderRepositoryInterface;
use App\Interfaces\Repositories\PayoutRepositoryInterface;
use App\Interfaces\Repositories\ProductRepositoryInterface;
use App\Interfaces\Repositories\SalesRepositoryInterface;
use App\Interfaces\Repositories\StoreOwnersRepositoryInterface;
use App\Interfaces\Repositories\StoreRepositoryInterface;
use App\Interfaces\Repositories\StoreUserRepositoryInterface;
use App\Interfaces\Services\DashboardServiceInterface;

class DashboardService implements DashboardServiceInterface
{
    private $adminRepository;
    private $productRepository;
    private $salesRepository;
    private $storeRepository;
    private $userRepository;
    private $storeOwnersRepository;
    private $orderRepository;
    private $customerRepository;
    private $orderDetailsRepository;
    private $payoutRepository;
    private $commissionRepository;

    public function __construct(
        AdminRepositoryInterface $adminRepository,
        ProductRepositoryInterface $productRepository,
        SalesRepositoryInterface $salesRepository,
        StoreRepositoryInterface $storeRepository,
        StoreUserRepositoryInterface $userRepository,
        StoreOwnersRepositoryInterface $storeOwnersRepository,
        OrderRepositoryInterface $orderRepository,
        CustomerRepositoryInterface $customerRepository,
        OrderDetailsRepositoryInterface $orderDetailsRepository,
        PayoutRepositoryInterface $payoutRepository,
        CommissionRepositoryInterface $commissionRepository
    ) {
        $this->adminRepository = $adminRepository;
        $this->productRepository = $productRepository;
        $this->salesRepository = $salesRepository;
        $this->storeRepository = $storeRepository;
        $this->userRepository = $userRepository;
        $this->storeOwnersRepository = $storeOwnersRepository;
        $this->orderRepository = $orderRepository;
        $this->customerRepository = $customerRepository;
        $this->orderDetailsRepository = $orderDetailsRepository;
        $this->payoutRepository = $payoutRepository;
        $this->commissionRepository = $commissionRepository;
    }

    public function getAdminDashboardData()
    {
        $data = (object) [
            'products' => $this->productRepository->getAllProductCount(),
            'store_users' => $this->userRepository->findStoreUsersCount(),
            'stores' => $this->storeRepository->findManyCount(),
            'admin_users' => $this->adminRepository->findAllCount(),
            'sales_per_month' => $this->salesRepository->findManyMonthlySales(),
        ];

        return new AdminDashboardResource($data);
    }

    public function getUserDashboardData()
    {
        $user = auth()->user()->id;
        $storeIds = $this->storeOwnersRepository->findStoresByUserId($user);

        $data = (object)[
            'orders_count' => $this->orderRepository->findStoreOdersCount($storeIds),
            'customers_count' => $this->customerRepository->findStoreCustomersCount($storeIds),
            'stores_count' => $this->storeOwnersRepository->findStoreCountByUserId($user),
            'sales_per_month' => $this->orderDetailsRepository->findMonthlySales($storeIds),
            'commission_per_month' => $this->commissionRepository->findMonthlyCommission($user),
            'payouts' => $this->payoutRepository->findTotalPayout($user)
        ];

        return new UserDashboardResource($data);
    }
}
