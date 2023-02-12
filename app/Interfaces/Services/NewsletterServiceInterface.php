<?php

namespace App\Interfaces\Services;

use App\Models\Store;

interface NewsletterServiceInterface
{
    public function subscribeContact(string $email, Store $store);
    public function unsubscribeContact(string $email, Store $store);
    public function findContact(string $email);
}
