<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 *
 * Migration for create or drop table `roles`
 *
 **/
class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Create table `roles`
         **/
        Schema::create('roles', function (Blueprint $table) {

            /**
             * Create fields for table `roles`
             **/
            $table->unsignedInteger('id')->autoIncrement();
            $table->tinyInteger('admin')->default(0);
            $table->string('name', 64);
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();

            /**
             * Create indexes for table `roles`
             **/
            $table->unique(['name']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
