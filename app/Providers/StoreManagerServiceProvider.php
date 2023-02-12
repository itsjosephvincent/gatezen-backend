<?php

namespace App\Providers;

use App\Models\Store;
use App\Services\StoreManager;
use Illuminate\Support\ServiceProvider;

class StoreManagerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $store = new StoreManager;

        $this->app->instance(StoreManager::class, $store);
        $this->app->bind(Store::class, function () use ($store) {
            return $store->getStore();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
