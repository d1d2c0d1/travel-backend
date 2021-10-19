<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 *
 * Migration for create or drop table `items`
 *
 **/
class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Create table `items`
         **/
        Schema::create('items', function (Blueprint $table) {

            /**
             * Create fields for table `items`
             **/
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->tinyInteger('status')->default(0);
            $table->unsignedBigInteger('created_user_id')->default(0);
            $table->unsignedBigInteger('owner_user_id')->default(0)->nullable();
            $table->unsignedBigInteger('edit_user_id')->default(0)->nullable();
            $table->unsignedBigInteger('accepted_user_id')->default(0)->nullable();
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('country_id');
            $table->unsignedInteger('region_id');
            $table->unsignedInteger('city_id');
            $table->unsignedBigInteger('area_id')->nullable();
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('price_type_id');
            $table->unsignedInteger('type_id');
            $table->bigInteger('price')->nullable();
            $table->string('name', 255);
            $table->string('code', 255);
            $table->text('description');
            $table->string('image', 255)->nullable();
            $table->integer('views')->default(0);
            $table->integer('reviews')->default(0);
            $table->integer('likes')->default(0);
            $table->integer('favorites')->default(0);
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();

            /**
             * Create indexes for table `items`
             **/
            $table->unique(['code']);
            $table->index(['created_user_id']);
            $table->index(['owner_user_id']);
            $table->index(['edit_user_id']);
            $table->index(['accepted_user_id']);
            $table->index(['company_id']);
            $table->index(['country_id']);
            $table->index(['region_id']);
            $table->index(['city_id']);
            $table->index(['area_id']);
            $table->index(['category_id']);
            $table->index(['price_type_id']);
            $table->index(['type_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
