<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingZonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_zones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('store_category_id')->unsigned();
            $table->longText('countries');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('shipping_zones', function (Blueprint $table) {
            $table->foreign('store_category_id')->references('id')->on('store_categories')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('shipping_zones');
    }
}
