<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTheGateIndexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('the_gate_index', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('tgi_user_id');
            $table->string('tgi_referral_code');
            $table->string('company_name')->nullable();
            $table->string('company_registration_number')->nullable();
            $table->string('company_address')->nullable();
            $table->decimal('euro_in_tokens', 8, 2)->nullable();
            $table->decimal('euro_in_shares', 8, 2)->nullable();
            $table->string('partner_role_name');
            $table->string('created_on_date');
            $table->string('portal_id');
            $table->string('portal_name');
            $table->bigInteger('role_id');
            $table->boolean('is_partnership_paid');
            $table->string('account_type');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('the_gate_index', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('the_gate_index');
    }
}
