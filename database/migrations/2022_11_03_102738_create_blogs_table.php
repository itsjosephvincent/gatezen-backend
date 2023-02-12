<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('thumbnail_url');
            $table->string('title');
            $table->longText('content');
            $table->bigInteger('store_category_id')->unsigned();
            $table->bigInteger('blog_category_id')->unsigned();
            $table->string('slug');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('blogs', function (Blueprint $table) {
            $table->foreign('store_category_id')->references('id')->on('store_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('blog_category_id')->references('id')->on('blog_categories')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('blogs');
    }
}
