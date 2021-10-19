<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 *
 * Migration for create or drop table `gallery_image`
 *
 **/
class CreateGalleryImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Create table `gallery_image`
         **/
        Schema::create('gallery_image', function (Blueprint $table) {

            /**
             * Create fields for table `gallery_image`
             **/
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->unsignedBigInteger('created_user_id');
            $table->unsignedBigInteger('gallery_id');
            $table->string('src', 255);
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();

            /**
             * Create indexes for table `gallery_image`
             **/
            $table->index(['created_user_id']);
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
        Schema::dropIfExists('gallery_image');
    }
}
