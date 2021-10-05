<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 *
 * Migration for create or drop table `price_types`
 *
 **/
class CreatePriceTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Create table `price_types`
         **/
        Schema::create('price_types', function (Blueprint $table) {

            /**
             * Create fields for table `price_types`
             **/
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('name', 128);
            $table->string('code', 255);

            /**
             * Create indexes for table `price_types`
             **/
            $table->unique(['name']);
            $table->unique(['code']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('price_types');
    }
}
