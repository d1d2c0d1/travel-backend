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
            $table->bigInteger('transaction_id')->index();
            $table->tinyInteger('status')->index();
            $table->bigInteger('invoice_id')->index();
            $table->bigInteger('account_id')->index();
            $table->bigInteger('item_id')->index();
            $table->integer('amount');
            $table->dateTime('payment_at');
            $table->string('subscription_id');
            $table->string('payment_currency');
            $table->string('payment_amount');
            $table->string('currency');
            $table->string('card_first_six');
            $table->string('card_last_four');
            $table->string('card_type');
            $table->string('card_exp_date');
            $table->boolean('test_mode');
            $table->string('payment_status');
            $table->string('opperation_type');
            $table->string('token_recipient');
            $table->string('name');
            $table->string('email');
            $table->string('ip');
            $table->string('ip_country');
            $table->string('ip_city');
            $table->string('ip_region');
            $table->string('ip_district');
            $table->string('ip_latitude');
            $table->string('ip_longitude');
            $table->string('issuer');
            $table->string('issuer_bank_country');
            $table->string('description');
            $table->string('card_product');
            $table->string('payment_method');
            $table->json('data');
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
