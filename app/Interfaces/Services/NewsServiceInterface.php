<?php

namespace App\Interfaces\Services;

interface NewsServiceInterface
{
    public function findNews();
    public function findOneById(string $slug);
}
