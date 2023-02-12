<?php

namespace App\Mail;

use App\Models\Store;
use App\Repositories\StoreCategoryRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    protected $token;
    protected $store;
    protected $storeCategoryRepository;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token, Store $store)
    {
        $this->token = $token;
        $this->store = $store;
        $this->storeCategoryRepository = new StoreCategoryRepository();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $storeCategory = $this->storeCategoryRepository->findOneById($this->store->store_category_id);

        $emailSubject = 'Account Confirmation';
        return $this->view('emails.verification.email-verification')
            ->subject($emailSubject)
            ->with([
                'logo' => $storeCategory->logo_url,
                'token' => $this->token,
                'url' => $this->store->url,
                'store_category_id' => $this->store->store_category_id
            ]);
    }
}
