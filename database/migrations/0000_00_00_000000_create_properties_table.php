<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 *
 * Migration for create or drop table `properties`
 *
 **/
class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Create table `properties`
         **/
        Schema::create('properties', function (Blueprint $table) {

            /**
             * Create fields for table `properties`
             **/
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('name', 128);
            $table->string('code', 128);
            $table->unsignedInteger('item_type_id')->nullable();
            $table->unsignedTinyInteger('type_id')->default(0);
            $table->string('default', 255);

            /**
             * Create indexes for table `properties`
             **/
            $table->index(['item_type_id']);
            $table->index(['type_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
