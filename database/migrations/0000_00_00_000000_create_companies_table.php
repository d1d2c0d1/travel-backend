<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 *
 * Migration for create or drop table `companies`
 *
 **/
class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Create table `companies`
         **/
        Schema::create('companies', function (Blueprint $table) {

            /**
             * Create fields for table `companies`
             **/
            $table->unsignedInteger('id')->autoIncrement();
            $table->tinyInteger('status')->default(0);
            $table->string('name', 128);
            $table->unsignedBigInteger('create_user_id');
            $table->unsignedBigInteger('owner_user_id')->nullable();
            $table->unsignedInteger('country_id');
            $table->unsignedInteger('region_id');
            $table->unsignedInteger('city_id')->nullable();
            $table->unsignedBigInteger('area_id')->nullable();
            $table->unsignedSmallInteger('language_id')->default(1);
            $table->string('point', 255)->default('[0,0]');
            $table->string('code', 128);
            $table->text('description');
            $table->string('logo', 255)->nullable();
            $table->integer('views')->default(0);
            $table->integer('likes')->default(0);
            $table->integer('reviews')->default(0);
            $table->integer('favorites')->default(0);
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();

            /**
             * Create indexes for table `companies`
             **/
            $table->unique(['name']);
            $table->unique(['code']);
            $table->index(['create_user_id']);
            $table->index(['owner_user_id']);
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
        Schema::dropIfExists('companies');
    }
}
