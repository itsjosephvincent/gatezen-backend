<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingZoneMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_zone_methods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('shipping_zone_id')->unsigned();
            $table->bigInteger('shipping_method_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('shipping_zone_methods', function (Blueprint $table) {
            $table->foreign('shipping_zone_id')->references('id')->on('shipping_zones')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('shipping_method_id')->references('id')->on('shipping_methods')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('shipping_zone_methods');
    }
}
