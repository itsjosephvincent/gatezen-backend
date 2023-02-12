<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('store_category_id')->unsigned();
            $table->bigInteger('vat_id')->unsigned();
            $table->string('name');
            $table->longText('description');
            $table->integer('quantity')->default(0);
            $table->decimal('price', 8, 2);
            $table->decimal('retail_price', 8, 2);
            $table->decimal('wholesale_price', 8, 2);
            $table->integer('reorder_level');
            $table->enum('status', ['active', 'coming_soon', 'deactivated', 'draft', 'pending'])->default('pending');
            $table->date('release_date')->nullable();
            $table->string('slug');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreign('store_category_id')->references('id')->on('store_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('vat_id')->references('id')->on('vats')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
