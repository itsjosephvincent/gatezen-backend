<?php

namespace App\Interfaces\Repositories;

interface FaqCategoryRepositoryInterface
{
    public function findMany();
    public function findOneByCategoryName(object $payload);
}
