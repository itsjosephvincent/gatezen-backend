<?php

namespace App\Interfaces\Services;

interface LogServiceInterface
{
    public function findLogs(object $payload);
    public function findUserLogs(object $payload);
    public function findStoreLogs(object $payload, int $storeId);
}
