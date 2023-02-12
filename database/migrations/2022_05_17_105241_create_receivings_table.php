<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceivingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receivings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('status', ['completed', 'pending'])->default('pending');
            $table->bigInteger('encoded_by')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('receivings', function (Blueprint $table) {
            $table->foreign('encoded_by')->references('id')->on('admins')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('receivings');
    }
}
