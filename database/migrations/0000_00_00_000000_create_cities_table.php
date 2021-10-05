<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 *
 * Migration for create or drop table `cities`
 *
 **/
class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Create table `cities`
         **/
        Schema::create('cities', function (Blueprint $table) {

            /**
             * Create fields for table `cities`
             **/
            $table->unsignedInteger('id')->autoIncrement();
            $table->unsignedInteger('country_id');
            $table->unsignedInteger('region_id');
            $table->string('name', 128);
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();

            /**
             * Create indexes for table `cities`
             **/
            $table->index(['country_id']);
            $table->index(['region_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
