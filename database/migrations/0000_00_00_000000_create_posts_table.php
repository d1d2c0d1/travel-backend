<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 *
 * Migration for create or drop table `posts`
 *
 **/
class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Create table `posts`
         **/
        Schema::create('posts', function (Blueprint $table) {

            /**
             * Create fields for table `posts`
             **/
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('title', 256);
            $table->string('code', 256);
            $table->text('content');
            $table->unsignedBigInteger('user_id');
            $table->tinyInteger('status')->default(0);
            $table->bigInteger('views');
            $table->bigInteger('likes');
            $table->bigInteger('favorites');
            $table->bigInteger('comments');
            $table->unsignedInteger('country_id');
            $table->unsignedInteger('region_id')->nullable();
            $table->unsignedInteger('city_id')->nullable();
            $table->unsignedBigInteger('area_id')->nullable();
            $table->unsignedSmallInteger('language_id')->default(1);
            $table->unsignedInteger('company_id')->nullable();
            $table->unsignedInteger('category_id');
            $table->string('image', 255)->nullable();
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();

            /**
             * Create indexes for table `posts`
             **/
            $table->unique(['code']);
            $table->index(['user_id']);
            $table->index(['country_id']);
            $table->index(['region_id']);
            $table->index(['city_id']);
            $table->index(['area_id']);
            $table->index(['language_id']);
            $table->index(['company_id']);
            $table->index(['category_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
