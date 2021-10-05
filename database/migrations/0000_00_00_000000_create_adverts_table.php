<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 *
 * Migration for create or drop table `adverts`
 *
 **/
class CreateAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Create table `adverts`
         **/
        Schema::create('adverts', function (Blueprint $table) {

            /**
             * Create fields for table `adverts`
             **/
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('title', 255);
            $table->string('description', 2048)->nullable();
            $table->string('image', 255);
            $table->unsignedSmallInteger('type_id');
            $table->unsignedSmallInteger('language_id');

            /**
             * Create indexes for table `adverts`
             **/
            $table->index(['type_id']);
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
        Schema::dropIfExists('adverts');
    }
}
