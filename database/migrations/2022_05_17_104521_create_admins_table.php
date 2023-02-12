<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birthdate');
            $table->string('gender');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamp('confirmed_at')->nullable();
            $table->string('img_url')->nullable();
            $table->enum('is_2fa_enabled', ['disabled', 'google'])->default('disabled');
            $table->string('google_2fa_secret', 300);
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('admins');
    }
}
