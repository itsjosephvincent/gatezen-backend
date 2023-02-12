<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsHeadlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_headlines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('news_category_id')->unsigned();
            $table->string('title');
            $table->string('image_url')->nullable();
            $table->longText('description');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('news_headlines', function (Blueprint $table) {
            $table->foreign('news_category_id')->references('id')->on('news_categories')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_headlines');
    }
}
