<?php

namespace App\Jobs;

use App\Repositories\ExternalDataRepository;
use App\Repositories\ProductInventoryRepository;
use App\Zoho\Inventory\ItemAdjustment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessZohoItemAdjustment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $orderDetails;
    protected $adjustItem;
    protected $externalDataRepository;
    protected $productInventoryRepository;

    /**
     * Create a new job instance. 
     *
     * @return void
     */
    public function __construct($orderDetails)
    {
        $this->orderDetails = $orderDetails;
        $this->adjustItem = new ItemAdjustment();
        $this->externalDataRepository = new ExternalDataRepository();
        $this->productInventoryRepository = new ProductInventoryRepository();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $externalData = $this->externalDataRepository->findInventoryAdjustmentExternalDataByProductId($this->orderDetails);
        $adjustedItemData = $this->adjustItem->index($externalData->external_id, $this->orderDetails);
        $newExternalData = $this->externalDataRepository->createInventoryAdjustmentExternalData($adjustedItemData, $this->orderDetails);
        $this->productInventoryRepository->create($this->orderDetails, $newExternalData->id);
    }
}
