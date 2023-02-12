<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Interfaces\Services\NewsServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $newsService;

    public function __construct(NewsServiceInterface $newsService)
    {
        $this->newsService = $newsService;
    }

    public function index()
    {
        return $this->newsService->findNews();
    }

    public function show($slug): JsonResponse
    {
        return $this->newsService->findOneById($slug)->response();
    }
}
