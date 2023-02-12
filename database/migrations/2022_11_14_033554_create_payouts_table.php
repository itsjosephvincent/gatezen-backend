<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use SebastianBergmann\Complexity\Complexity;

class CreatePayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->enum('payout_status', ['cancelled', 'completed', 'new', 'pending'])->default('new');
            $table->json('user_bank_details');
            $table->string('reference')->nullable();
            $table->longText('internal_note')->nullable();
            $table->decimal('amount', 8, 2);
            $table->dateTime('paid_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('payouts', function (Blueprint $table) {
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
        Schema::dropIfExists('payouts');
    }
}
