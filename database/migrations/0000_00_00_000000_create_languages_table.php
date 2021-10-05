<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 *
 * Migration for create or drop table `languages`
 *
 **/
class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Create table `languages`
         **/
        Schema::create('languages', function (Blueprint $table) {

            /**
             * Create fields for table `languages`
             **/
            $table->unsignedSmallInteger('id')->autoIncrement();
            $table->string('name', 128);
            $table->string('code', 2);

            /**
             * Create indexes for table `languages`
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
        Schema::dropIfExists('languages');
    }
}
