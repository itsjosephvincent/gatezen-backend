<?php

namespace App\Services;

use App\Http\Resources\MailJetResource;
use App\Interfaces\Services\MailJetContactServiceInterface;
use App\Interfaces\Services\NewsletterServiceInterface;

class NewsletterService implements NewsletterServiceInterface
{
    private $mailJetContactService;

    public function __construct(MailJetContactServiceInterface $mailJetContactService)
    {
        $this->mailJetContactService = $mailJetContactService;
    }

    public function subscribeContact($email, $store)
    {
        $response = $this->mailJetContactService->subscribeContactToList($email, $store);

        return new MailJetResource($response);
    }

    public function unsubscribeContact($email, $store)
    {
        $response = $this->mailJetContactService->unsubscribeContactToList($email, $store);

        return new MailJetResource($response);
    }

    public function findContact($email)
    {
        $response = $this->mailJetContactService->findContactByEmail($email);

        return new MailJetResource($response);
    }
}
