<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('template_id')->unsigned();
            $table->bigInteger('store_category_id')->unsigned();
            $table->string('url')->unique();
            $table->string('domain')->unique();
            $table->string('store_name');
            $table->enum('status', ['active', 'deactivated', 'pending'])->default('active');
            $table->boolean('is_private')->default(false);
            $table->boolean('is_wholesaler')->default(false);
            $table->string('theme_color')->nullable();
            $table->string('text_color')->nullable();
            $table->string('template_version')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('stores', function ($table) {
            $table->foreign('template_id')->references('id')->on('templates')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('stores');
    }
}
