<?php

namespace App\Interfaces\Services;

interface ProductMediaServiceInterface
{
    public function findProductMedias(object $payload, int $productId);
    public function createProductMedia(object $payload);
    public function findProductMedia(int $mediaId);
    public function updateProductMedia(object $payload, int $mediaId);
    public function deleteProductMedia(int $mediaId);
}
