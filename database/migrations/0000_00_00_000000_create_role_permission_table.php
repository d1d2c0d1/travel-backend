<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 *
 * Migration for create or drop table `role_permission`
 *
 **/
class CreateRolePermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Create table `role_permission`
         **/
        Schema::create('role_permission', function (Blueprint $table) {

            /**
             * Create fields for table `role_permission`
             **/
            $table->unsignedInteger('id')->autoIncrement();
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('permission_id');
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();

            /**
             * Create indexes for table `role_permission`
             **/
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
        Schema::dropIfExists('role_permission');
    }
}
