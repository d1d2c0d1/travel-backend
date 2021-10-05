<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 *
 * Migration for create or drop table `areas`
 *
 **/
class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Create table `areas`
         **/
        Schema::create('areas', function (Blueprint $table) {

            /**
             * Create fields for table `areas`
             **/
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->unsignedInteger('country_id');
            $table->unsignedInteger('region_id');
            $table->unsignedInteger('city_id');
            $table->string('name', 128);
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();

            /**
             * Create indexes for table `areas`
             **/
            $table->index(['country_id']);
            $table->index(['region_id']);
            $table->index(['city_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('areas');
    }
}
