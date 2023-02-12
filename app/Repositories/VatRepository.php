<?php

namespace App\Repositories;

use App\Interfaces\Repositories\VatRepositoryInterface;
use App\Models\Vat;

class VatRepository implements VatRepositoryInterface
{
    public function findById($id)
    {
        return Vat::findOrFail($id);
    }
}
