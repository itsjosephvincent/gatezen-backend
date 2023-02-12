<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ErrorRepositoryInterface;
use App\Models\ErrorLog;

class ErrorRepository implements ErrorRepositoryInterface
{
    public function saveError($errorType, $description)
    {
        $error = new ErrorLog();
        $error->error_type = $errorType;
        $error->description = $description;
        $error->save();
        return $error->fresh();
    }
}
