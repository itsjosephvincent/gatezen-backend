<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('content');
            $table->bigInteger('store_category_id')->unsigned();
            $table->bigInteger('faq_category_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('faqs', function (Blueprint $table) {
            $table->foreign('store_category_id')->references('id')->on('store_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('faq_category_id')->references('id')->on('faq_categories')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('faqs');
    }
}
