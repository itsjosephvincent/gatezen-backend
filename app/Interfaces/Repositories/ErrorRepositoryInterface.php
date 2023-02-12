<?php

namespace App\Interfaces\Repositories;

interface ErrorRepositoryInterface
{
    public function saveError(string $errorType, string $description);
}
