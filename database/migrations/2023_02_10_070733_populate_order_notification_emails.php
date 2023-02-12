<?php

use App\Models\StoreCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PopulateOrderNotificationEmails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $saintRoches = StoreCategory::findOrFail(4);
        $saintRoches->order_notification_emails = array('hello@goodavenue.com');
        $saintRoches->save();
        $hauger = StoreCategory::findOrFail(5);
        $hauger->order_notification_emails = array('hello@goodavenue.com');
        $hauger->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        StoreCategory::truncate();
    }
}
