<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 *
 * Migration for create or drop table `users`
 *
 **/
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Create table `users`
         **/
        Schema::create('users', function (Blueprint $table) {

            /**
             * Create fields for table `users`
             **/
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->unsignedInteger('role_id')->default(10);
            $table->string('name', 128);
            $table->string('email', 128);
            $table->string('password', 128);
            $table->string('remember_token', 64)->nullable();
            $table->unsignedInteger('country_id')->default(1);
            $table->unsignedInteger('region_id')->default(1);
            $table->unsignedInteger('city_id')->default(1);
            $table->unsignedBigInteger('area_id')->default(1);
            $table->unsignedSmallInteger('language_id')->default(1);
            $table->string('photo', 255)->nullable();
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();

            /**
             * Create indexes for table `users`
             **/
            $table->unique(['email']);
            $table->unique(['remember_token']);
            $table->unique(['photo']);
            $table->index(['role_id']);
            $table->index(['country_id']);
            $table->index(['region_id']);
            $table->index(['city_id']);
            $table->index(['area_id']);
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
        Schema::dropIfExists('users');
    }
}
