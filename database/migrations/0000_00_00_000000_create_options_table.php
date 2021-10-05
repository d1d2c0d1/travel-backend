<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 *
 * Migration for create or drop table `options`
 *
 **/
class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Create table `options`
         **/
        Schema::create('options', function (Blueprint $table) {

            /**
             * Create fields for table `options`
             **/
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('name', 255);
            $table->string('code', 255);
            $table->string('value', 255);

            /**
             * Create indexes for table `options`
             **/

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('options');
    }
}
