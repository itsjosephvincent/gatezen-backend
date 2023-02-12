<?php

namespace App\Mail;

use App\Models\Store;
use App\Repositories\StoreCategoryRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $subject;
    public $message;
    public $store;
    public $storeCategoryRepository;

    public function __construct($name, $email, $subject, $message, Store $store)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
        $this->store = $store;
        $this->storeCategoryRepository = new StoreCategoryRepository();
    }

    public function build()
    {

        $storeCategory = $this->storeCategoryRepository->findOneById($this->store->store_category_id);

        return $this->markdown('emails.contact.contact-us')
            ->subject($this->subject)
            ->with([
                'store' => $this->store,
                'name' => $this->name,
                'email' => $this->email,
                'subject' => $this->subject,
                'message' => $this->message,
                'store_category_name' => $storeCategory->name
            ]);
    }
}
