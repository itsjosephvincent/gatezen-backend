<?php

namespace App\Interfaces\Services;

use App\Models\Store;

interface MailJetContactServiceInterface
{
    public function subscribeContactToList(string $email, Store $store);
    public function unsubscribeContactToList(string $email, Store $store);
    public function findContactByEmail(string $email);
}
