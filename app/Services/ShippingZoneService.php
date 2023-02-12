<?php

namespace App\Services;

use App\Http\Resources\ShippingZoneResource;
use App\Interfaces\Repositories\ShippingZoneRepositoryInterface;
use App\Interfaces\Services\ShippingZoneServiceInterface;

class ShippingZoneService implements ShippingZoneServiceInterface
{
    private $shippingZoneRepository;

    public function __construct(ShippingZoneRepositoryInterface $shippingZoneRepository)
    {
        $this->shippingZoneRepository = $shippingZoneRepository;
    }

    public function findByStoreCategoryId($storeCategoryId)
    {
        $data = $this->shippingZoneRepository->findOneByStoreCategoryId($storeCategoryId);

        return new ShippingZoneResource($data);
    }
}
