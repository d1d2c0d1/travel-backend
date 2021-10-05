<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 *
 * Migration for create or drop table `notifications`
 *
 **/
class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Create table `notifications`
         **/
        Schema::create('notifications', function (Blueprint $table) {

            /**
             * Create fields for table `notifications`
             **/
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->string('title', 255);
            $table->string('description', 255);
            $table->tinyInteger('view')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->text('additional')->default('[]');
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();

            /**
             * Create indexes for table `notifications`
             **/
            $table->index(['user_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
