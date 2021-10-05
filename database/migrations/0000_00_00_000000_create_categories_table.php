<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 *
 * Migration for create or drop table `categories`
 *
 **/
class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Create table `categories`
         **/
        Schema::create('categories', function (Blueprint $table) {

            /**
             * Create fields for table `categories`
             **/
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('name', 128);
            $table->string('code', 128);
            $table->text('description')->nullable();
            $table->unsignedBigInteger('created_user_id');
            $table->unsignedBigInteger('edit_user_id');
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();

            /**
             * Create indexes for table `categories`
             **/
            $table->unique(['code']);
            $table->index(['created_user_id']);
            $table->index(['edit_user_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
