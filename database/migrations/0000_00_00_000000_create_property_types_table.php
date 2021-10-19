<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 *
 * Migration for create or drop table `property_types`
 *
 **/
class CreatePropertyTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Create table `property_types`
         **/
        Schema::create('property_types', function (Blueprint $table) {

            /**
             * Create fields for table `property_types`
             **/
            $table->unsignedTinyInteger('id')->autoIncrement();
            $table->string('name', 128);
            $table->string('code', 128);

            /**
             * Create indexes for table `property_types`
             **/
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
        Schema::dropIfExists('property_types');
    }
}
