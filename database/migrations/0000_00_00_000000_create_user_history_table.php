<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 *
 * Migration for create or drop table `user_history`
 *
 **/
class CreateUserHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Create table `user_history`
         **/
        Schema::create('user_history', function (Blueprint $table) {

            /**
             * Create fields for table `user_history`
             **/
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('permission_id');
            $table->tinyInteger('status')->default(0);
            $table->text('additional')->nullable();
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();

            /**
             * Create indexes for table `user_history`
             **/
            $table->index(['user_id']);
            $table->index(['role_id']);
            $table->index(['permission_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_history');
    }
}
