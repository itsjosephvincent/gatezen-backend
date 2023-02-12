<?php

namespace App\Jobs;

use App\Exceptions\Product\InvalidAddingItem;
use App\Exceptions\Product\ItemAlreadyExistException;
use App\Repositories\ExternalDataRepository;
use App\Zoho\Inventory\AddItem;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessZohoItem implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $product;
    protected $addItem;
    protected $externalData;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($product)
    {
        $this->product = $product;
        $this->addItem = new AddItem();
        $this->externalData = new ExternalDataRepository();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $result = $this->addItem->index($this->product);

        if ($result['code'] == '0') {
            $this->externalData->createProduct($result['item']['item_id'], $result, $this->product);
        } else if ($result['code'] == '1001') {
            throw new ItemAlreadyExistException();
        } else {
            throw new InvalidAddingItem();
        }
    }
}
