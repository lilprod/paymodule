<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->nullable();
            $table->integer('paymentmode_id')->nullable();
            $table->string('title')->nullable();
            $table->string('recurring_id')->nullable();
            $table->float('order_amount');
            $table->string('description')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('tx_reference')->nullable();
            $table->string('payment_method')->nullable();
            $table->dateTime('date_payment')->nullable();
            $table->integer('telephone')->nullable();
            $table->string('identifier')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('payment_reference')->nullable();
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
