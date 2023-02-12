<?php

namespace App\Interfaces\Services;

use App\Models\Store;

interface FaqServiceInterface
{
    public function findFaqs(object $payload);
    public function createFaq(object $payload);
    public function findFaq(int $faqId);
    public function findFaqByCategory(Store $store);
    public function updateFaq(object $payload, int $faqId);
    public function deleteFaq(int $faqId);
}
