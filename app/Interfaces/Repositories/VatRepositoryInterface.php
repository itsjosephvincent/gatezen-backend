<?php

namespace App\Interfaces\Repositories;

interface VatRepositoryInterface
{
    public function findById(int $id);
}
