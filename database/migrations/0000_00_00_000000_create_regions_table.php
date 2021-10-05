<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 *
 * Migration for create or drop table `regions`
 *
 **/
class CreateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Create table `regions`
         **/
        Schema::create('regions', function (Blueprint $table) {

            /**
             * Create fields for table `regions`
             **/
            $table->unsignedInteger('id')->autoIncrement();
            $table->unsignedInteger('country_id');
            $table->string('name', 128);
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();

            /**
             * Create indexes for table `regions`
             **/
            $table->index(['country_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regions');
    }
}
