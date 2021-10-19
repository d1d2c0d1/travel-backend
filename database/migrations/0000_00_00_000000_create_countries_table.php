<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 *
 * Migration for create or drop table `countries`
 *
 **/
class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Create table `countries`
         **/
        Schema::create('countries', function (Blueprint $table) {

            /**
             * Create fields for table `countries`
             **/
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('name', 128);
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->unsignedSmallInteger('language_id')->default(1);

            /**
             * Create indexes for table `countries`
             **/
            $table->unique(['name']);
            $table->index(['language_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
