<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 *
 * Migration for create or drop table `permissions`
 *
 **/
class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Create table `permissions`
         **/
        Schema::create('permissions', function (Blueprint $table) {

            /**
             * Create fields for table `permissions`
             **/
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('name', 128);
            $table->string('code', 128);
            $table->tinyInteger('admin')->default(0);
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();

            /**
             * Create indexes for table `permissions`
             **/

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
