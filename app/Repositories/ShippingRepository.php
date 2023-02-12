<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ShippingRepositoryInterface;
use App\Models\Shipping;

class ShippingRepository implements ShippingRepositoryInterface
{
    public function create($createOrderId, $customerAddress, $customerMobile)
    {
        $createShipping = new Shipping();
        $createShipping->order_id = $createOrderId;
        $createShipping->care_of = isset($customerAddress->care_of) ? $customerAddress->care_of : NULL;
        $createShipping->address_1 = $customerAddress->address_1;
        $createShipping->address_2 = isset($customerAddress->address_2) ? $customerAddress->address_2 : NULL;
        $createShipping->city = $customerAddress->city;
        $createShipping->postal_code = $customerAddress->postal_code;
        $createShipping->country_id  = $customerAddress->country_id;
        $createShipping->mobile_no = isset($customerMobile) ? $customerMobile : NULL;
        $createShipping->delivery_notes = isset($customerAddress->delivery_notes) ? $customerAddress->delivery_notes : NULL;
        $createShipping->address_type = $customerAddress->address_type;
        $createShipping->save();
        return $createShipping->fresh();
    }
}
