<?php

namespace App\Interfaces\Services;

interface AddressServiceInterface
{
    public function findAddresses(object $payload);
    public function findAddress(int $id);
    public function createAddress(object $payload);
    public function updateAddress(object $payload, int $id);
}
