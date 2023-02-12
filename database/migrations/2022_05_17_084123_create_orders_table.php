<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('store_id')->unsigned();
            $table->bigInteger('shipping_method_id')->unsigned()->nullable();
            $table->enum('status', ['cancelled', 'delivered', 'pending', 'pre_order', 'ready_to_ship', 'shipped'])->default('pending');
            $table->string('number');
            $table->date('date')->nullable();
            $table->decimal('order_total', 8, 2);
            $table->date('confirmed_date')->nullable();
            $table->string('reference')->nullable();
            $table->decimal('discount', 8, 2)->default(0.00);
            $table->string('note')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('orders', function ($table) {
            $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('store_id')->references('id')->on('stores')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
}
