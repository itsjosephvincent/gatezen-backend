<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceivingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receiving_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('receiving_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('supplier_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('receiving_details', function (Blueprint $table) {
            $table->foreign('receiving_id')->references('id')->on('receivings')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('receiving_details');
    }
}
