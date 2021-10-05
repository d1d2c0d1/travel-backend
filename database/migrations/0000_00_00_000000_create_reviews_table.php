<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 *
 * Migration for create or drop table `reviews`
 *
 **/
class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Create table `reviews`
         **/
        Schema::create('reviews', function (Blueprint $table) {

            /**
             * Create fields for table `reviews`
             **/
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->unsignedBigInteger('created_user_id');
            $table->unsignedBigInteger('accepted_user_id')->nullable();
            $table->unsignedBigInteger('edit_user_id')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->unsignedBigInteger('item_id');
            $table->tinyInteger('rating')->default(0);
            $table->text('comment');
            $table->unsignedBigInteger('gallery_id')->nullable();
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();

            /**
             * Create indexes for table `reviews`
             **/
            $table->index(['created_user_id']);
            $table->index(['accepted_user_id']);
            $table->index(['edit_user_id']);
            $table->index(['item_id']);
            $table->index(['gallery_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
