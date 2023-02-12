<?php

namespace App\Services;

use App\Enum\MarketingContactListChannel;
use App\Enum\MarketingContactListProvider;
use App\Enum\MarketingContactListType;
use App\Http\Resources\MailJetResource;
use App\Interfaces\Repositories\MarketingContactListRepositoryInterface;
use App\Interfaces\Services\MailJetContactServiceInterface;
use \Mailjet\Resources;

class MailJetContactService implements MailJetContactServiceInterface
{
    private $mailjet;
    private $marketingContactListRepository;

    public function __construct(
        MarketingContactListRepositoryInterface $marketingContactListRepository
    ) {
        $this->mailjet = new \Mailjet\Client(config('mailjet.public_key'), config('mailjet.private_key'), true, ['version' => 'v3']);
        $this->marketingContactListRepository = $marketingContactListRepository;
    }

    public function subscribeContactToList($email, $store)
    {
        $contactList = $this->marketingContactListRepository->findForStoreCategory($store->store_category_id, MarketingContactListProvider::MailJet->value, MarketingContactListChannel::Email->value, MarketingContactListType::StoreCustomer->value);

        $body = [
            'Properties' => [
                'name' => "store_id: " . $store->id,
                'newsletter_sub' => $store->url,
            ],
            'Action' => 'addnoforce',
            'Email' => $email
        ];

        $response = $this->mailjet->post(Resources::$ContactslistManagecontact, [
            'id' => $contactList->list_id,
            'body' => $body
        ]);

        return $response->getData();
    }

    public function unsubscribeContactToList($email, $store)
    {
        $contactList = $this->marketingContactListRepository->findForStoreCategory($store->store_category_id, MarketingContactListProvider::MailJet->value, MarketingContactListChannel::Email->value, MarketingContactListType::StoreCustomer->value);

        $body = [
            'ContactsLists' => [
                [
                    'Action' => "unsub",
                    'ListID' => $contactList->list_id
                ]
            ]
        ];

        $response = $this->mailjet->post(Resources::$ContactManagecontactslists, [
            'id' => $email,
            'body' => $body
        ]);

        return $response->getData();
    }

    public function findContactByEmail($email)
    {
        $response = $this->mailjet->get(Resources::$Contact, [
            'id' => $email
        ]);

        return new MailJetResource($response->getData());
    }
}
