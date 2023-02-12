<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('mobile');
            $table->date('birthdate')->nullable();
            $table->string('password');
            $table->timestamp('confirmed_at')->nullable();
            $table->string('img_url')->nullable();
            $table->boolean('is_active')->default(true);
            $table->enum('is_2fa_enabled', ['disabled', 'google'])->default('disabled');
            $table->string('google2fa_secret', 300)->nullable();
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
