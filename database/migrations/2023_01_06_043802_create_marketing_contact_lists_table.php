<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketingContactListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketing_contact_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('store_id')->nullable();
            $table->string('provider');
            $table->string('channel');
            $table->string('name');
            $table->string('list_id');
            $table->string('type');
            $table->bigInteger('store_category_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('marketing_contact_lists', function (Blueprint $table) {
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
        Schema::dropIfExists('marketing_contact_lists');
    }
}
