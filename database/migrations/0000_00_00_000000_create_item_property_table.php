<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 *
 * Migration for create or drop table `item_property`
 *
 **/
class CreateItemPropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Create table `item_property`
         **/
        Schema::create('item_property', function (Blueprint $table) {

            /**
             * Create fields for table `item_property`
             **/
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->unsignedBigInteger('created_user_id');
            $table->unsignedBigInteger('edit_user_id')->nullable();
            $table->unsignedBigInteger('item_id');
            $table->unsignedInteger('property_id');
            $table->text('value')->nullable();
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();

            /**
             * Create indexes for table `item_property`
             **/
            $table->index(['created_user_id']);
            $table->index(['edit_user_id']);
            $table->index(['item_id']);
            $table->index(['property_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_property');
    }
}
