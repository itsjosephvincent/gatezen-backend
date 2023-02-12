<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('store_id')->unsigned();
            $table->enum('customer_type', ['company', 'individual'])->default('individual');
            $table->string('company_name')->nullable();
            $table->string('business_number')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('display_name');
            $table->date('birthdate')->nullable();
            $table->string('gender')->nullable();
            $table->string('email')->unique();
            $table->string('mobile')->nullable();
            $table->string('password');
            $table->string('img_url')->nullable();
            $table->boolean('is_active');
            $table->date('email_verified_at')->nullable();
            $table->enum('is_2fa_enabled', ['disabled', 'google'])->default('disabled');
            $table->string('google2fa_secret', 300)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('customers', function ($table) {
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('store_id')->references('id')->on('stores')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('customers');
    }
}
